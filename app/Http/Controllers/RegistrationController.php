<?php

namespace App\Http\Controllers;

use App\Models\Runner;
use App\Models\Registration;
use App\Models\RaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Get available race categories with current registration counts.
     */
    public function getCategories()
    {
        $db = config('database.default');
        $dbname = DB::connection()->getDatabaseName();
        \Log::info("Fetching categories for registration form. DB: $db, Name: $dbname");

        $categories = RaceCategory::withCount('registrations')->get();

        \Log::info("Found " . count($categories) . " categories in DB.");

        // DIAGNOSTIC FALLBACK: If DB is empty, return a dummy one to verify the API is reached
        if (count($categories) === 0) {
            \Log::warning("No categories found in DB! Returning dummy for diagnostic.");
            return response()->json([
                [
                    'id' => 99,
                    'name' => 'DIAGNOSTIC: 10km Test Run',
                    'distance' => 10,
                    'price_local' => 40000,
                    'price_international' => 30,
                    'registrations_count' => 0,
                    'registration_limit' => 5000
                ]
            ]);
        }

        return response()->json($categories);
    }

    /**
     * Get current exchange rate.
     */
    public function getExchangeRate()
    {
        $service = app(\App\Services\CurrencyExchangeService::class);
        $rate = $service->getUsdToTshRate();
        return response()->json(['rate' => $rate]);
    }

    /**
     * Handle runner registration.
     */
    public function register(Request $request)
    {
        \Log::info('Registration attempt', $request->all());

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'nationality' => 'required|string|max:255',
            'region' => 'nullable|string|max:255',
            'country' => 'nullable|string|required_if:nationality,International',
            'passport_number' => 'nullable|string|required_if:nationality,International',
            't_shirt_size' => 'required|string|in:S,M,L,XL,XXL',
            'gender' => 'required|in:male,female,other',
            'category_id' => 'required|exists:race_categories,id',
            'type' => 'required|in:adult,student',
            'student_id' => 'nullable|string|max:255|required_if:type,student',
            'institution_name' => 'nullable|string|max:255|required_if:type,student',
        ]);

        if ($validator->fails()) {
            \Log::warning('Registration validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check Capacity
        $category = RaceCategory::find($request->category_id);
        $currentCount = Registration::where('category_id', $request->category_id)->count();

        if ($currentCount >= $category->registration_limit) {
            \Log::warning('Registration limit reached', ['category_id' => $request->category_id]);
            return response()->json(['message' => 'Registration for this distance has reached its limit.'], 403);
        }

        try {
            DB::beginTransaction();

            // Find or create runner
            // Using email + names to allow family members to share an email address
            $runner = Runner::updateOrCreate(
                [
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                ],
                $request->only(['phone', 'nationality', 'region', 'country', 'passport_number', 't_shirt_size', 'gender'])
            );
            \Log::info('Runner updated/created', ['runner_id' => $runner->id]);

            // Create Registration (WITHOUT bib number - assigned after payment)
            $registration = Registration::create([
                'runner_id' => $runner->id,
                'category_id' => $category->id,
                'type' => $request->type,
                'student_id' => $request->student_id,
                'institution_name' => $request->institution_name,
                'bib_number' => null, // Will be assigned after payment verification
                'status' => 'pending',
            ]);
            \Log::info('Registration created', ['registration_id' => $registration->id]);

            DB::commit();

            // Calculate Amount based on Nationality and Type
            $amount = 0;
            $currency = 'TZS';

            if ($request->nationality === 'International') {
                $baseAmountTzs = 40000;
                // Use service to convert 40k TZS to USD
                $exchangeService = app(\App\Services\CurrencyExchangeService::class);
                $amount = $exchangeService->convertTshToUsd($baseAmountTzs);
                $currency = 'USD';
            } else {
                // Fixed flat rate for Locals as per client request
                $amount = 40000;
                $currency = 'TZS';
            }

            // Apply 50% discount for students
            if ($request->type === 'student') {
                $amount = $amount * 0.5;
            }

            // Send SMS notification
            try {
                $smsService = app(\App\Services\SmsService::class);

                // SMS 1: Payment Details
                $smsMessage = "Hello {$runner->first_name}, thank you for registering for Swahili Marathon 2026!\n\n";
                $smsMessage .= "Category: {$category->name}\n";
                $smsMessage .= "Registration ID: {$registration->id}\n\n";
                $smsMessage .= "Please complete payment:\n";
                $smsMessage .= "Lipa Number: 515515\n";
                $smsMessage .= "Account: SWAHILI MARATHON\n";
                $smsMessage .= "Amount: " . number_format($amount) . " {$currency}";

                $smsService->sendAndLog(
                    $runner->phone,
                    $smsMessage,
                    'registration',
                    $runner->id
                );

                // SMS 2: What's Next / Manual Verification
                $ownerPhone = "+255755165284"; // From contact page
                $nextMessage = "What's next after payment:\n";
                $nextMessage .= "Please send your transaction reference number or a screenshot of your payment to {$ownerPhone} for verification.\n";
                $nextMessage .= "Your Bib number will be assigned once verified.";

                $smsService->sendAndLog(
                    $runner->phone,
                    $nextMessage,
                    'registration_instructions',
                    $runner->id
                );

            } catch (\Exception $e) {
                \Log::error('SMS sending failed', ['error' => $e->getMessage()]);
                // Don't fail the registration if SMS fails
            }

            return response()->json([
                'message' => 'Registration successful',
                'registration' => $registration->load('runner', 'category'),
                'payment_info' => [
                    'amount' => $amount,
                    'currency' => $currency,
                    'lipa_number' => '515515', // Placeholder Lipa Number
                    'account_name' => 'SWAHILI MARATHON',
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Registration error occurred', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Registration failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Verify payment and assign bib number.
     */
    public function verifyPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'registration_id' => 'required|exists:registrations,id',
            'payment_reference' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $registration = Registration::findOrFail($request->registration_id);

            // Check if already paid
            if ($registration->status === 'paid') {
                return response()->json([
                    'message' => 'Payment already verified',
                    'bib_number' => $registration->bib_number
                ]);
            }

            DB::beginTransaction();

            // Assign bib number now that payment is verified
            $bibNumber = $this->generateBibNumber($registration->category);

            $registration->update([
                'bib_number' => $bibNumber,
                'status' => 'paid'
            ]);

            // TODO: Create payment record
            // Payment::create([...]);

            DB::commit();

            \Log::info('Payment verified and bib assigned', [
                'registration_id' => $registration->id,
                'bib_number' => $bibNumber
            ]);

            // Send SMS notification
            try {
                $runner = $registration->runner;
                $smsService = app(\App\Services\SmsService::class);
                $smsMessage = "Payment confirmed! Your bib number is {$bibNumber}.\n\n";
                $smsMessage .= "Race: {$registration->category->name}\n";
                $smsMessage .= "Event: Swahili Marathon 2026\n";
                $smsMessage .= "See you at the starting line!";

                $smsService->sendAndLog(
                    $runner->phone,
                    $smsMessage,
                    'payment',
                    $runner->id
                );
            } catch (\Exception $e) {
                \Log::error('SMS sending failed for payment', ['error' => $e->getMessage()]);
            }

            return response()->json([
                'message' => 'Payment verified successfully',
                'bib_number' => $bibNumber,
                'registration' => $registration->load('runner', 'category')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Payment verification failed', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Payment verification failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Specialized bib number generation based on specific ranges.
     * 2.5km: 0001 - 1000
     * 5km: 1001 - 2000
     * 10km: 2001 - 3250
     * 21km: 3251 - 4500
     * 42km: 4501 - 5000
     */
    private function generateBibNumber($category)
    {
        $distance = (float) $category->distance;
        $range = ['min' => 0, 'max' => 0];

        if ($distance <= 2.5) {
            $range = ['min' => 1, 'max' => 1000];
        } elseif ($distance <= 5.0) {
            $range = ['min' => 1001, 'max' => 2000];
        } elseif ($distance <= 10.0) {
            $range = ['min' => 2001, 'max' => 3250];
        } elseif ($distance <= 21.1) {
            $range = ['min' => 3251, 'max' => 4500];
        } else { // 42km (42.19)
            $range = ['min' => 4501, 'max' => 5000];
        }

        // Find the highest existing bib number for this category that falls in the range
        $maxBib = Registration::where('category_id', $category->id)
            ->whereNotNull('bib_number')
            ->whereRaw('CAST(bib_number AS SIGNED) >= ?', [$range['min']])
            ->whereRaw('CAST(bib_number AS SIGNED) <= ?', [$range['max']])
            ->max(DB::raw('CAST(bib_number AS SIGNED)'));

        $nextBib = $maxBib ? ($maxBib + 1) : $range['min'];

        if ($nextBib > $range['max']) {
            throw new \Exception("All bib numbers for {$category->name} have been assigned.");
        }

        return str_pad($nextBib, 4, '0', STR_PAD_LEFT);
    }
}
