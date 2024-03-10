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
        /*
         * TODO : Create procedures
         * DB::unprepared('CREATE OR REPLACE PROCEDURE XXX');
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*
         * TODO : Drop procedures
         * DB::unprepared('DROP PROCEDURE XXX');
         */
    }
};
