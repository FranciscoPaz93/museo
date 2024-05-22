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
        Schema::create('jars', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('code')->unique();
            $table->string('collector')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedBigInteger('collection_iteration_id');
            $table->foreign('collection_iteration_id')->references('id')->on('collection_iterations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jars');
    }
};
