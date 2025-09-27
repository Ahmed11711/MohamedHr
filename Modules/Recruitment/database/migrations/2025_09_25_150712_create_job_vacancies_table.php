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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->integer('department_id');
            $table->text('required_skills')->nullable();
            $table->foreignId('qualification_id')->constrained('qualifications')->onDelete('cascade');
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->date('posting_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->enum('job_status', ['open', 'closed'])->default('open');
            $table->string('job_source')->nullable();
            $table->enum('job_type', ['full-time', 'part-time', 'contract'])->default('full-time');
            $table->foreignId('work_location_id')->nullable()->constrained('countries')->onDelete('set null');
            $table->integer('number_of_vacancies')->default(1);
            $table->foreignId('hiring_manager_id')->nullable()->constrained('employeeinfos')->onDelete('set null');
            $table->string('experience_level')->nullable();
            $table->longText('job_description')->nullable();
            $table->integer('recruitment_attachment_id')->nullable();
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
