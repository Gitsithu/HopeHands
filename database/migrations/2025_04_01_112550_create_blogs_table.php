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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained('divisions');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('township_id')->nullable()->constrained('townships');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->longText('link')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('image_url')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
