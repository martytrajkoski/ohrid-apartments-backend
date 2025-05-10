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
        Schema::table('rooms', function (Blueprint $table) {
            $table->json('bed')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    
     public function down(): void
     {
         Schema::table('rooms', function (Blueprint $table) {
             $table->enum('bed', [
                 '1 single bed',
                 '2 single beds',
                 '3 single beds',
                 '1 double bed',
                 '2 double beds'
             ])->change();
         });
     }
};
