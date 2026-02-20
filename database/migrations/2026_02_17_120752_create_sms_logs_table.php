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
        Schema::create('sms_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('runner_id')->nullable()->constrained('runners')->onDelete('set null');
            $table->string('phone_number');
            $table->text('message');
            $table->string('sms_type')->default('custom'); // registration, payment, reminder, custom
            $table->enum('status', ['sent', 'failed', 'pending'])->default('pending');
            $table->text('api_response')->nullable();
            $table->foreignId('sent_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_logs');
    }
};
