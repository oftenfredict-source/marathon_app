<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroupBooking;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupBookingController extends Controller
{
    /**
     * List all group bookings (paginated).
     */
    public function index(Request $request)
    {
        $query = GroupBooking::withCount('registrations')
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->when($request->search, function ($q, $s) {
                $q->where('leader_name', 'like', "%{$s}%")
                    ->orWhere('group_name', 'like', "%{$s}%")
                    ->orWhere('leader_phone', 'like', "%{$s}%");
            })
            ->latest();

        return response()->json($query->paginate(20));
    }

    /**
     * Get single group booking with all members and their registrations.
     */
    public function show($id)
    {
        $group = GroupBooking::with([
            'registrations.runner',
            'registrations.category',
        ])->findOrFail($id);

        return response()->json($group);
    }

    /**
     * Verify payment for a group booking — assigns bib numbers to all members.
     */
    public function verifyPayment(Request $request, $id)
    {
        $request->validate([
            'payment_reference' => 'required|string',
        ]);

        $group = GroupBooking::with(['registrations.runner', 'registrations.category'])
            ->findOrFail($id);

        if ($group->status === 'paid') {
            return response()->json(['message' => 'Payment already verified.'], 409);
        }

        try {
            DB::beginTransaction();

            $group->update([
                'status' => 'paid',
                'payment_reference' => $request->payment_reference,
                'verified_at' => now(),
                'verified_by' => Auth::id(),
            ]);

            $bibsSummary = [];

            foreach ($group->registrations as $registration) {
                // Generate bib for this member's category
                $bibNumber = $this->generateBibNumber($registration->category);

                $registration->update([
                    'bib_number' => $bibNumber,
                    'status' => 'paid',
                ]);

                $bibsSummary[] = [
                    'name' => $registration->runner->first_name . ' ' . $registration->runner->last_name,
                    'bib' => $bibNumber,
                    'category' => $registration->category->name,
                ];
            }

            DB::commit();

            // SMS leader with all bibs
            try {
                $smsService = app(\App\Services\SmsService::class);
                $smsMsg = "Payment confirmed for group '{$group->group_name}'!\n\n";
                $smsMsg .= "Bib Numbers:\n";
                foreach ($bibsSummary as $b) {
                    $smsMsg .= "- {$b['name']} ({$b['category']}): Bib #{$b['bib']}\n";
                }
                $smsMsg .= "\nSee you at the starting line!";

                $smsService->sendAndLog($group->leader_phone, $smsMsg, 'group_payment', $group->id);

                // SMS individual members too (if they have phones different from leader)
                foreach ($group->registrations as $registration) {
                    $runner = $registration->runner;
                    if ($runner->phone && $runner->phone !== $group->leader_phone) {
                        $memberMsg = "Payment confirmed! Your bib for Swahili Marathon 2026: #{$registration->bib_number}\n";
                        $memberMsg .= "Category: {$registration->category->name}. See you at the race!";
                        $smsService->sendAndLog($runner->phone, $memberMsg, 'group_payment_member', $runner->id);
                    }
                }
            } catch (\Exception $e) {
                \Log::error('Group SMS failed', ['error' => $e->getMessage()]);
            }

            // Reload fresh data
            $group->load(['registrations.runner', 'registrations.category']);

            return response()->json([
                'message' => 'Group payment verified and bibs assigned.',
                'group' => $group,
                'bibs_summary' => $bibsSummary,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Group payment verification failed', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Verification failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Bib number generation — same ranges as individual registration.
     * 2.5km: 0001–1000 | 5km: 1001–2000 | 10km: 2001–3250
     * 21km: 3251–4500  | 42km: 4501–5000
     */
    private function generateBibNumber($category)
    {
        $distance = (float) $category->distance;

        if ($distance <= 2.5)
            $range = ['min' => 1, 'max' => 1000];
        elseif ($distance <= 5.0)
            $range = ['min' => 1001, 'max' => 2000];
        elseif ($distance <= 10.0)
            $range = ['min' => 2001, 'max' => 3250];
        elseif ($distance <= 21.1)
            $range = ['min' => 3251, 'max' => 4500];
        else
            $range = ['min' => 4501, 'max' => 5000];

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
