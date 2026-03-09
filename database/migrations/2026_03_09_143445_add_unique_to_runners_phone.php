<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('runners', function (Blueprint $table) {
            // First, remove existing composite unique index if it exists to avoid conflicts
            // Searching for the index name usually depends on the driver, but Laravel defaults to:
            // runners_email_first_name_last_name_dob_unique
            try {
                $table->dropUnique(['email', 'first_name', 'last_name', 'dob']);
            } catch (\Exception $e) {
                // Ignore if it doesn't exist
            }

            // Add unique index to phone
            $table->unique('phone');

            // Re-add composite unique without phone if needed, 
            // but usually phone unique is the strongest requirement now.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('runners', function (Blueprint $table) {
            $table->dropUnique(['phone']);
            $table->unique(['email', 'first_name', 'last_name', 'dob']);
        });
    }
};
