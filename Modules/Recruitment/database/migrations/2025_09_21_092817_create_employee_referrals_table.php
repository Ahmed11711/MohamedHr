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
        Schema::create('employee_referrals', function (Blueprint $table) {
            $table->id();
            $table->integer('referring_employee_id'); // Employeeinfo who made the referral
            $table->integer('candidate_id');
            $table->integer('job_vacancie_id');
            $table->enum('referral_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->decimal('referral_bonus', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_referrals');
    }
};
