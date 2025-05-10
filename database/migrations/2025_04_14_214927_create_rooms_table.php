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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->integer('room_size');
            $table->enum('bed', ['1 single bed', '2 single beds', '3 single beds', '1 double bed', '2 double beds']);
            $table->json('bathroom')->nullable();
            $table->json('view')->nullable();
            $table->string('parking')->nullable();
            $table->json('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
