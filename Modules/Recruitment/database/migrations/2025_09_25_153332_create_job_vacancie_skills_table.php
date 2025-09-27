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
        Schema::create('job_vacancie_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('job_vacancie_id');
            $table->string('skill');
            $table->enum('proficiency_level', ['beginner', 'intermediate', 'fluent', 'expert'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancie_skills');
    }
};
