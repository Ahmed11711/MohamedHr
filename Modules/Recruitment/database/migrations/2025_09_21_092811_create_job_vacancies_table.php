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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->integer('dpartment_id');
            $table->text('required_skills')->nullable();
            $table->integer('qualification_id');
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->date('posting_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->enum('job_status', ['open', 'closed'])->default('open');
            $table->string('job_source')->nullable();
            $table->enum('job_type', ['full-time', 'part-time', 'contract'])->default('full-time');
            $table->integer('work_location_id');
            $table->integer('number_of_vacancies')->default(1);
            $table->integer('hiring_manager_id');
            $table->string('experience_level')->nullable();
            $table->longText('job_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
