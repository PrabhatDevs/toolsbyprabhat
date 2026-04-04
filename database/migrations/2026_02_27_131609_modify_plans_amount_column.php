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
        if (Schema::hasColumn('plans', 'amount')) {
            Schema::table('plans', function (Blueprint $table) {
                $table->dropColumn('amount');
            });
        }

        Schema::table('plans', function (Blueprint $table) {

            $table->double('amount')->after('plan_type');

        });
    }

    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {

            $table->dropColumn('amount');

        });

        Schema::table('plans', function (Blueprint $table) {

            $table->integer('amount')->after('plan_type');

        });
    }
};
