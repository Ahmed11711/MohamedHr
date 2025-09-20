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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('name');
            $table->string('relationship')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};
