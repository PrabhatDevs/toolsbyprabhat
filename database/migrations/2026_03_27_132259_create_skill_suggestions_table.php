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
        Schema::create('skill_suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., "Full Stack Developer"
            $table->json('skills');
            // To track which roles are most common
            $table->integer('hit_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_suggestions');
    }
};
