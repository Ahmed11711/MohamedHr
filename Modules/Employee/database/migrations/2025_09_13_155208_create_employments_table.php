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
        $table->integer('employee_id');

        $table->date('start_hire')->nullable();
        $table->date('end_hire')->nullable();

        $table->integer('job_title_id');
        $table->integer('manager_id');

        $table->string('company_name')->nullable();
        $table->integer('branch_id');
        $table->integer('department_id');

        $table->integer('notice_period_id');
        $table->integer('training_period_id');

        $table->integer('approval_id');

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
