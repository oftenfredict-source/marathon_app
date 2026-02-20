<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update all categories to have uniform pricing
        // Local: 40,000 TZS
        // International: 15 USD (Approx 40k TZS / 2600)
        DB::table('race_categories')->update([
            'price_local' => 40000,
            'price_international' => 15
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No easy reverse without individual tracking, but we can set back to a default if needed
        // For now, this is a one-way fix.
    }
};
