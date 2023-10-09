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
        Schema::create('pending_jobs', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('job');
            $table->string('pending_jobable_type');
            $table->unsignedBigInteger('pending_jobable_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_jobs');
    }
};
