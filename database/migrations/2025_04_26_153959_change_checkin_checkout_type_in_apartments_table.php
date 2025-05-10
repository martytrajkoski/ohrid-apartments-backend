<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->renameColumn('check_in', 'old_check_in');
            $table->renameColumn('check_out', 'old_check_out');
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->json('check_in')->nullable();
            $table->json('check_out')->nullable();
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn('old_check_in');
            $table->dropColumn('old_check_out');
        });
    }

    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->time('old_check_in')->nullable();
            $table->time('old_check_out')->nullable();
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn('check_in');
            $table->dropColumn('check_out');
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->renameColumn('old_check_in', 'check_in');
            $table->renameColumn('old_check_out', 'check_out');
        });
    }
};
