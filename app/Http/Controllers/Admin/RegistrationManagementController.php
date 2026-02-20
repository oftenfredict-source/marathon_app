<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Runner;
use App\Models\RaceCategory;
use Illuminate\Http\Request;

class RegistrationManagementController extends Controller
{
    /**
     * Get all pending registrations (not yet paid).
     */
    public function getPendingRegistrations()
    {
        $registrations = Registration::with(['runner', 'category'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $exchangeService = app(\App\Services\CurrencyExchangeService::class);
        $rate = $exchangeService->getUsdToTshRate() ?: 2455; // Fallback to a default if null

        $mappedRegistrations = $registrations->map(function ($registration) use ($rate) {
            $category = $registration->category;
            $currency = $registration->runner->nationality === 'International' ? 'USD' : 'TZS';
            $amount = 0;

            if ($registration->runner->nationality === 'International') {
                // Dynamic conversion using the rate fetched once
                $amount = round(40000 / $rate, 2);
            } else {
                $amount = 40000;
            }

            // Apply Student Discount
            if ($registration->type === 'student') {
                $amount = $amount * 0.5;
            }

            return [
                'id' => $registration->id,
                'runner_name' => $registration->runner->first_name . ' ' . $registration->runner->last_name,
                'email' => $registration->runner->email,
                'phone' => $registration->runner->phone,
                'category' => $category->name,
                'type' => $registration->type,
                'amount' => $amount,
                'currency' => $currency,
                'nationality' => $registration->runner->nationality,
                'registered_at' => $registration->created_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json($mappedRegistrations);
    }

    /**
     * Get all paid registrations.
     */
    public function getPaidRegistrations()
    {
        $registrations = Registration::with(['runner', 'category'])
            ->where('status', 'paid')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function ($registration) {
                return [
                    'id' => $registration->id,
                    'runner_name' => $registration->runner->first_name . ' ' . $registration->runner->last_name,
                    'email' => $registration->runner->email,
                    'phone' => $registration->runner->phone,
                    'category' => $registration->category->name,
                    'bib_number' => $registration->bib_number,
                    'type' => $registration->type,
                    'nationality' => $registration->runner->nationality,
                    'paid_at' => $registration->updated_at->format('Y-m-d H:i:s'),
                ];
            });

        return response()->json($registrations);
    }

    /**
     * Get all registrations with optional filtering.
     */
    public function getAllRegistrations(Request $request)
    {
        $query = Registration::with(['runner', 'category']);

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category if provided
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $registrations = $query->orderBy('created_at', 'desc')->get();

        return response()->json($registrations);
    }

    /**
     * Get registration statistics.
     */
    public function getStatistics()
    {
        $stats = [
            'total_registrations' => Registration::count(),
            'pending_registrations' => Registration::where('status', 'pending')->count(),
            'paid_registrations' => Registration::where('status', 'paid')->count(),
            'total_runners' => Runner::count(),
            'total_revenue' => \DB::table('registrations as r')
                ->join('runners as runners', 'r.runner_id', '=', 'runners.id')
                ->where('r.status', 'paid')
                ->select(\DB::raw('SUM(CASE WHEN runners.nationality <> "International" THEN (CASE WHEN r.type = "student" THEN 20000 ELSE 40000 END) ELSE 0 END) as total'))
                ->value('total') ?: 0,
            'categories' => RaceCategory::withCount('registrations')->get()->map(function ($category) {
                return [
                    'name' => $category->name,
                    'registrations' => $category->registrations_count,
                    'limit' => $category->registration_limit,
                    'percentage' => round(($category->registrations_count / $category->registration_limit) * 100, 2),
                ];
            }),
        ];

        return response()->json($stats);
    }
}
