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
        Schema::create('checks', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->text('exterior')->nullable();
            $table->text('interior')->nullable();
            $table->text('mechanical')->nullable();
            $table->text('electrical')->nullable();
            $table->text('oil')->nullable();
            $table->text('tires')->nullable();
            $table->datetime('scheduled');
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
