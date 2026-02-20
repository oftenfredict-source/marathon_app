<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Runner;
use App\Models\Registration;
use Illuminate\Http\Request;

class RunnerController extends Controller
{
    /**
     * Get all runners.
     */
    public function index(Request $request)
    {
        \Log::info('API: Fetching runners index', ['search' => $request->search]);
        $query = Runner::with('registrations.category');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by nationality
        if ($request->filled('nationality')) {
            $nationality = $request->nationality;
            if ($nationality === 'Local') {
                $query->whereIn('nationality', ['Local', 'Tanzanian']);
            } elseif ($nationality === 'International') {
                $query->whereNotIn('nationality', ['Local', 'Tanzanian']);
            } else {
                $query->where('nationality', $nationality);
            }
        }

        $runners = $query->orderBy('created_at', 'desc')->get()->map(function ($runner) {
            $registration = $runner->registrations->first();
            return [
                'id' => $runner->id,
                'full_name' => $runner->first_name . ' ' . $runner->last_name,
                'email' => $runner->email,
                'phone' => $runner->phone,
                'nationality' => $runner->nationality,
                'gender' => $runner->gender,
                'dob' => $runner->dob,
                't_shirt_size' => $runner->t_shirt_size,
                'category' => $registration ? $registration->category->name : 'N/A',
                'bib_number' => $registration ? $registration->bib_number : null,
                'status' => $registration ? $registration->status : 'N/A',
                'checked_in' => $registration ? ($registration->checked_in ?? false) : false,
            ];
        });

        \Log::info('API: Runners index fetched', ['count' => count($runners)]);
        return response()->json($runners);
    }

    /**
     * Get runner details.
     */
    public function show($id)
    {
        $runner = Runner::with(['registrations.category'])->findOrFail($id);

        return response()->json([
            'id' => $runner->id,
            'first_name' => $runner->first_name,
            'last_name' => $runner->last_name,
            'email' => $runner->email,
            'phone' => $runner->phone,
            'nationality' => $runner->nationality,
            'country' => $runner->country,
            'region' => $runner->region,
            'gender' => $runner->gender,
            'dob' => $runner->dob,
            't_shirt_size' => $runner->t_shirt_size,
            'registrations' => $runner->registrations->map(function ($reg) {
                return [
                    'id' => $reg->id,
                    'category' => $reg->category->name,
                    'bib_number' => $reg->bib_number,
                    'status' => $reg->status,
                    'type' => $reg->type,
                    'registered_at' => $reg->created_at->format('Y-m-d H:i:s'),
                ];
            }),
        ]);
    }

    /**
     * Update runner information.
     */
    public function update(Request $request, $id)
    {
        $runner = Runner::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:runners,email,' . $id,
            'phone' => 'sometimes|string',
            'tshirt_size' => 'sometimes|in:XS,S,M,L,XL,XXL',
        ]);

        $runner->update($validated);

        return response()->json([
            'message' => 'Runner updated successfully',
            'runner' => $runner,
        ]);
    }

    /**
     * Check in a runner.
     */
    public function checkIn($id)
    {
        \Log::info('Check-in attempt', ['runner_id' => $id]);

        try {
            $registration = Registration::where('runner_id', $id)
                ->where('status', 'paid')
                ->firstOrFail();

            \Log::info('Paid registration found', ['reg_id' => $registration->id, 'bib' => $registration->bib_number]);

            $registration->update(['checked_in' => true]);

            return response()->json([
                'message' => 'Runner checked in successfully',
                'bib_number' => $registration->bib_number,
            ]);
        } catch (\Exception $e) {
            \Log::error('Check-in failed', ['runner_id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Check-in failed: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Export runners to CSV.
     */
    public function export()
    {
        $runners = Runner::with('registrations.category')->get();

        $csv = "First Name,Last Name,Email,Phone,Nationality,Gender,Category,Bib Number,Status\n";

        foreach ($runners as $runner) {
            $registration = $runner->registrations->first();
            $csv .= sprintf(
                "%s,%s,%s,%s,%s,%s,%s,%s,%s\n",
                $runner->first_name,
                $runner->last_name,
                $runner->email,
                $runner->phone,
                $runner->nationality,
                $runner->gender,
                $registration ? $registration->category->name : 'N/A',
                $registration ? $registration->bib_number : 'N/A',
                $registration ? $registration->status : 'N/A'
            );
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="runners_' . date('Y-m-d') . '.csv"');
    }
}
