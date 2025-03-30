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
        Schema::create('donators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained('divisions');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('phone')->nullable();
            $table->json('contact')->nullable();
            $table->text('remark')->nullable();
            $table->tinyInteger('stauts')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donators');
    }
};