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
    Schema::create('language_employees', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
        $table->foreignId('language_id')->constrained('languages')->onDelete('cascade');
        $table->string('proficiency_level')->nullable();
        $table->string('write_level')->nullable();
        $table->string('speak_level')->nullable();
        $table->string('conversation_level')->nullable();
        $table->timestamps();
        $table->unique(['employee_id', 'language_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_employees');
    }
};
