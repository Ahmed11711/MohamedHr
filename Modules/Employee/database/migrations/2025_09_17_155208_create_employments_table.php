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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('hire_date')->nullable();
            $table->foreignId('job_title_id')->constrained('job_titles')->onDelete('cascade');
            $table->foreignId('manager_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->string('company_name')->nullable();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->date('start_hire')->nullable();
            $table->date('end_hire')->nullable();
            $table->foreignId('notice_period_id')->constrained('notice_periods')->onDelete('cascade');
            $table->foreignId('training_period_id')->constrained('training_periods')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
