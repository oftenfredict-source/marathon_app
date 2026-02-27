<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->foreignId('group_booking_id')
                ->nullable()
                ->after('id')
                ->constrained('group_bookings')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['group_booking_id']);
            $table->dropColumn('group_booking_id');
        });
    }
};
