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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id');
            $table->string('candidate_name');
            $table->date('interview_date');
            $table->enum('interview_type',['onsite','online'])->default('onsite');
            $table->string('interviewer_name')->nullable();
            $table->string('interview_result')->nullable();
            $table->integer('interview_round')->default(1);
            $table->integer('interviewer_rating')->nullable();
            $table->string('interview_link')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
