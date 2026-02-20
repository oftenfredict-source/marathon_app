<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RaceCategory;
use App\Models\Marathon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Get all race categories for the active marathon.
     */
    public function index()
    {
        // Assuming we work with the first active marathon or the only one
        $marathon = Marathon::where('is_active', 1)->first() ?? Marathon::first();

        if (!$marathon) {
            return response()->json([]);
        }

        $categories = RaceCategory::where('marathon_id', $marathon->id)
            ->withCount('registrations')
            ->get();

        return response()->json($categories);
    }

    /**
     * Store a new race category.
     */
    public function store(Request $request)
    {
        $marathon = Marathon::where('is_active', 1)->first() ?? Marathon::first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'price_local' => 'required|numeric',
            'price_international' => 'required|numeric',
            'registration_limit' => 'required|integer',
        ]);

        $category = RaceCategory::create(array_merge($validated, [
            'marathon_id' => $marathon->id
        ]));

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ]);
    }

    /**
     * Update a race category.
     */
    public function update(Request $request, $id)
    {
        $category = RaceCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'distance' => 'sometimes|numeric',
            'price_local' => 'sometimes|numeric',
            'price_international' => 'sometimes|numeric',
            'registration_limit' => 'sometimes|integer',
        ]);

        $category->update($validated);

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category
        ]);
    }

    /**
     * Delete a race category.
     */
    public function destroy($id)
    {
        $category = RaceCategory::findOrFail($id);

        // Check if there are registrations
        if ($category->registrations()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete category with existing registrations. Try disabling it instead.'
            ], 422);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
