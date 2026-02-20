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
        Schema::create('runners', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('nationality');
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('t_shirt_size')->nullable();
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runners');
    }
};
