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
        Schema::create('employee_medicals', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');

            $table->string('certificate_number')->nullable();
            $table->decimal('certificate_value', 10, 2)->nullable();
            $table->date('certificate_start_date')->nullable();
            $table->date('certificate_end_date')->nullable();
            $table->date('last_checkup_date')->nullable();

            $table->boolean('has_medical_insurance')->default(false);
            $table->decimal('insurance_value', 10, 2)->nullable();
            $table->integer('insurance_company_id')->nullable();
            $table->string('policy_number')->nullable();

            $table->integer('blood_type_id')->nullable();
            $table->string('chronic_diseases')->nullable();
            $table->text('status')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_insurances');
    }
};
