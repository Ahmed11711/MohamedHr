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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeeinfo_id')->constrained('employeeinfos')->onDelete('cascade');
            $table->string('university');
            $table->string('college');
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('qualification');
            $table->string('specialization');
            $table->foreignId('education_level_id')->constrained('education_levels')->onDelete('cascade');
            $table->foreignId('study_type_id')->constrained('study_types')->onDelete('cascade'); // ✅ تصحيح
            $table->date('graduation_year');
            $table->string('degree');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
