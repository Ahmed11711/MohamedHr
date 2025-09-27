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
        Schema::create('application_screens', function (Blueprint $table) {
            $table->id();
            $table->integer('job_vacancie_id');
            $table->string('candidate_name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->date('application_date')->nullable();
            $table->enum('application_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->string('application_source')->nullable();
            $table->integer('match_score')->nullable();
            $table->integer('nationality_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_screens');
    }
};
