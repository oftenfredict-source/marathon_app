<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Runner;
use App\Models\Payment;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_runners' => Runner::count(),
            'total_revenue' => Payment::where('status', 'completed')->sum('amount'),
            'paid_registrations' => Registration::where('status', 'paid')->count(),
            'pending_payments' => Registration::where('status', 'pending')->count(),
            'recent_registrations' => Registration::with(['runner', 'category'])
                ->latest()
                ->take(5)
                ->get()
                ->map(function ($registration) {
                    return [
                        'bib_number' => $registration->bib_number ?? 'N/A',
                        'runner_name' => $registration->runner->first_name . ' ' . $registration->runner->last_name,
                        'category' => $registration->category->name,
                        'status' => $registration->status,
                        'date' => $registration->created_at->format('Y-m-d'),
                    ];
                }),
        ];

        return response()->json($stats);
    }
}
