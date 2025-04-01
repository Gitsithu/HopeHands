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
        Schema::create('category_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donator_id')->nullable()->constrained('donators');
            $table->foreignId('help_seeker_id')->nullable()->constrained('help_seekers');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_contributions');
    }
};
