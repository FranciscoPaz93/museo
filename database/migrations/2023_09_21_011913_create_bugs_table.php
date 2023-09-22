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
            $table->string('order')->unique();
            $table->string('family')->unique();
            $table->string('subfamily')->unique();
            $table->string('tribe')->unique();
            $table->string('genus')->unique();
            $table->string('species')->unique();
            $table->string('genitalia_results')->nullable();
            $table->string('final_result')->nullable();
            $table->string('gender')->nullable();
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
