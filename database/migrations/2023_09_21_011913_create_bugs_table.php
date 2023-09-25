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
            $table->string('genitalia_results')->nullable();
            $table->string('final_result')->nullable();
            $table->string('gender')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
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
