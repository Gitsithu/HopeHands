<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('help_seekers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained('divisions');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('township_id')->nullable()->constrained('townships');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('content')->nullable();
            $table->json('contact')->nullable();
            $table->enum('urgent_level', ['low', 'medium', 'high'])->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_seekers');
    }
};
