<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('group_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('group_name')->nullable();
            $table->string('leader_name');
            $table->string('leader_phone');
            $table->string('leader_email')->nullable();
            $table->enum('registration_type', ['adult', 'student'])->default('adult');
            $table->unsignedInteger('member_count');
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->decimal('subtotal_amount', 12, 2);
            $table->decimal('total_amount', 12, 2);
            $table->string('currency', 10)->default('TZS');
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->string('payment_reference')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_bookings');
    }
};
