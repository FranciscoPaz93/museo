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
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('order');
            $table->string('family');
            $table->string('subfamily');
            $table->string('genus');
            $table->string('species');
            $table->string('genitalia')->nullable();
            $table->string('gender')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('frontal_tubercle_length')->nullable();
            $table->string('distance_between_frontal_tubercle')->nullable();
            $table->string('epistome_brush_length')->nullable();
            $table->string('epistome_process_wide')->nullable();
            $table->string('eye_length')->nullable();
            $table->string('eye_wide')->nullable();
            $table->string('distance_between_eyes')->nullable();
            $table->string('pronotum_head_length')->nullable();
            $table->string('pronotum_length')->nullable();
            $table->string('metatorax_midline_length')->nullable();
            $table->string('abdominal_length')->nullable();
            $table->string('eliters_length')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('jar_id');
            $table->foreign('jar_id')->references('id')->on('jars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bugs');
    }
};
