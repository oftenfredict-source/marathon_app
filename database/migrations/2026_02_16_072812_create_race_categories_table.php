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
        Schema::create('race_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marathon_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., 5km, 10km, 21km, 42km
            $table->decimal('distance', 5, 2);
            $table->decimal('price_local', 10, 2);
            $table->decimal('price_international', 10, 2);
            $table->integer('registration_limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_categories');
    }
};
