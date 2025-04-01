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
        Schema::table('help_seekers', function (Blueprint $table) {
            $table->longText('link')->nullable()->after('urgent_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('help_seekers', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
};
