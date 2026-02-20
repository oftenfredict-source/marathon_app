<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Runner;
use App\Models\RaceCategory;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Get dashboard statistics.
     */
    public function getStatistics()
    {
        $totalRegistrations = Registration::count();
        $pendingPayments = Registration::where('status', 'pending')->count();
        $paidRegistrations = Registration::where('status', 'paid')->count();
        $totalRunners = Runner::count();

        // Calculate revenue
        $revenueData = Registration::where('status', 'paid')
            ->with(['runner', 'category'])
            ->get()
            ->reduce(function ($carry, $registration) {
                $amount = $registration->runner->nationality === 'International'
                    ? $registration->category->price_international
                    : $registration->category->price_local;

                $currency = $registration->runner->nationality === 'International' ? 'USD' : 'TZS';

                if ($currency === 'TZS') {
                    $carry['tzs'] += $amount;
                } else {
                    $carry['usd'] += $amount;
                }

                return $carry;
            }, ['tzs' => 0, 'usd' => 0]);

        // Category capacity
        $categories = RaceCategory::withCount('registrations')->get()->map(function ($category) {
            return [
                'name' => $category->name,
                'registrations' => $category->registrations_count,
                'limit' => $category->registration_limit,
                'percentage' => round(($category->registrations_count / $category->registration_limit) * 100, 1),
            ];
        });

        return response()->json([
            'total_registrations' => $totalRegistrations,
            'pending_payments' => $pendingPayments,
            'paid_registrations' => $paidRegistrations,
            'total_runners' => $totalRunners,
            'revenue_tzs' => number_format($revenueData['tzs']),
            'revenue_usd' => number_format($revenueData['usd']),
            'categories' => $categories,
        ]);
    }

    /**
     * Get chart data for dashboard.
     */
    public function getChartData()
    {
        // Registration trend (last 30 days)
        $registrationTrend = Registration::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Registrations by category
        $categoryDistribution = Registration::select('category_id', DB::raw('COUNT(*) as count'))
            ->with('category:id,name')
            ->groupBy('category_id')
            ->get()
            ->map(function ($item) {
                return [
                    'category' => $item->category->name,
                    'count' => $item->count,
                ];
            });

        // Payment status breakdown
        $paymentStatus = [
            ['status' => 'Paid', 'count' => Registration::where('status', 'paid')->count()],
            ['status' => 'Pending', 'count' => Registration::where('status', 'pending')->count()],
        ];

        // Daily registration rate (last 7 days)
        $dailyRate = Registration::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json([
            'registration_trend' => $registrationTrend,
            'category_distribution' => $categoryDistribution,
            'payment_status' => $paymentStatus,
            'daily_rate' => $dailyRate,
        ]);
    }

    /**
     * Get recent registrations.
     */
    public function getRecentRegistrations()
    {
        $recent = Registration::with(['runner', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($registration) {
                return [
                    'id' => $registration->id,
                    'runner_name' => $registration->runner->first_name . ' ' . $registration->runner->last_name,
                    'email' => $registration->runner->email,
                    'category' => $registration->category->name,
                    'status' => $registration->status,
                    'bib_number' => $registration->bib_number,
                    'created_at' => $registration->created_at->diffForHumans(),
                ];
            });

        return response()->json($recent);
    }
}
