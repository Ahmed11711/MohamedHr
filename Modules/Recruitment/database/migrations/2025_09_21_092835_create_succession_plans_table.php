<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('succession_plans', function (Blueprint $table) {
            $table->id();
            $table->string('target_job');
            $table->integer('candidate_id');
            $table->integer('position_id');
            $table->integer('readiness_rating')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('succession_plans');
    }
};
