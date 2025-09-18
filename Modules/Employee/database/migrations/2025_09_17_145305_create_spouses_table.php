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
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeeinfo_id')->constrained('employeeinfos')->onDelete('cascade');
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('marriage_date')->nullable();
            $table->foreignId('nationality_id')->constrained('nationalities')->onDelete('cascade');
            $table->string('national_id')->nullable();
            $table->date('expiry_national_id')->nullable();
            $table->string('passport_id')->nullable();
            $table->date('expiry_passport_id')->nullable();
            $table->string('work_place')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouses');
    }
};
