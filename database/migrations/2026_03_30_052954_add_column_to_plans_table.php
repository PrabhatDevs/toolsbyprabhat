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
        Schema::table('plans', function (Blueprint $table) {
            $table->integer('ai_credits')->default(0)->after('currency');
            $table->integer('pdf_credits')->default(0)->after('ai_credits');
            $table->integer('price_ind')->nullable()->after('pdf_credits');
            $table->integer('price_usd')->nullable()->after('price_ind');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('ai_credits');
            $table->dropColumn('pdf_credits');
            $table->dropColumn('price_ind');
            $table->dropColumn('price_usd');
        });
    }
};
