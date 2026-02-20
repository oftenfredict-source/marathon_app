<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Runner;
use App\Models\RaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Get registration summary report.
     */
    public function registrationSummary()
    {
        \Log::info('API: Fetching registration summary');
        $summary = Registration::select(
            'status',
            DB::raw('count(*) as total'),
            DB::raw('sum(case when type = "adult" then 1 else 0 end) as individual'),
            DB::raw('sum(case when type = "student" then 1 else 0 end) as group_reg')
        )
            ->groupBy('status')
            ->get();

        \Log::info('API: Registration summary fetched', ['count' => count($summary)]);
        return response()->json($summary);
    }

    /**
     * Get revenue analysis report.
     */
    public function revenueReport()
    {
        \Log::info('API: Fetching revenue report');
        $revenue = DB::table('registrations as r')
            ->join('runners as runners', 'r.runner_id', '=', 'runners.id')
            ->join('race_categories as rc', 'r.category_id', '=', 'rc.id')
            ->where('r.status', 'paid')
            ->select(
                'rc.name',
                DB::raw('COUNT(r.id) as total'),
                DB::raw('SUM(CASE 
                    WHEN runners.nationality <> "International" THEN 
                        (CASE WHEN r.type = "student" THEN 20000 ELSE 40000 END)
                    ELSE 0 
                END) as tzs'),
                DB::raw('SUM(CASE 
                    WHEN runners.nationality = "International" THEN 
                        (CASE WHEN r.type = "student" THEN 0.5 ELSE 1.0 END * rc.price_international)
                    ELSE 0 
                END) as usd')
            )
            ->groupBy('rc.name')
            ->get();

        // Convert the collection to the expected associative array format
        $formattedRevenue = $revenue->keyBy('name')->map(function ($item) {
            return [
                'tzs' => (float) $item->tzs,
                'usd' => (float) $item->usd,
                'total' => (int) $item->total
            ];
        });

        \Log::info('API: Revenue report fetched', ['count' => count($formattedRevenue)]);
        return response()->json($formattedRevenue);
    }

    /**
     * Get demographics report.
     */
    public function demographicsReport()
    {
        $gender = Runner::select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->get();

        $nationality = Runner::select('nationality', DB::raw('count(*) as count'))
            ->groupBy('nationality')
            ->get();

        $sizes = Runner::select('t_shirt_size', DB::raw('count(*) as count'))
            ->groupBy('t_shirt_size')
            ->orderBy('t_shirt_size')
            ->get();

        return response()->json([
            'gender' => $gender,
            'nationality' => $nationality,
            'tshirt_sizes' => $sizes
        ]);
    }
}
