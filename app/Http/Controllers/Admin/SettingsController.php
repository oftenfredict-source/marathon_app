<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marathon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Get system settings (active marathon details).
     */
    public function getSettings()
    {
        $marathon = Marathon::where('is_active', 1)->first() ?? Marathon::first();

        return response()->json([
            'marathon' => $marathon,
            'admin_user' => Auth::user(),
        ]);
    }

    /**
     * Update marathon details.
     */
    public function updateMarathon(Request $request)
    {
        $marathon = Marathon::where('is_active', 1)->first() ?? Marathon::first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if (!$marathon) {
            $marathon = Marathon::create($validated);
        } else {
            $marathon->update($validated);
        }

        return response()->json([
            'message' => 'Marathon settings updated',
            'marathon' => $marathon
        ]);
    }

    /**
     * Update admin profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }
}
