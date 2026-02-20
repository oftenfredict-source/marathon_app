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
            // Drop existing unique index
            $table->dropUnique(['email']);

            // Add composite unique index
            $table->unique(['email', 'first_name', 'last_name', 'dob']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('runners', function (Blueprint $table) {
            $table->dropUnique(['email', 'first_name', 'last_name', 'dob']);
            $table->unique('email');
        });
    }
};
