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
    Schema::create('dependents', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employeeinfo_id')->constrained('employeeinfos')->onDelete('cascade');
        $table->string('name');
        $table->foreignId('relationship_id')->constrained('relationships')->onDelete('cascade');
        $table->date('dob')->nullable();
        $table->enum('gender', ['male','female'])->nullable();
        $table->foreignId('nationality_id')->constrained('nationalities')->onDelete('cascade');
        $table->string('national_id')->nullable();
        $table->string('phone')->nullable();
        $table->foreignId('medical_insurance_id')->constrained('medical_insurances')->onDelete('cascade');
        $table->string('description_medical_insurance')->nullable();
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
        Schema::dropIfExists('dependents');
    }
};
