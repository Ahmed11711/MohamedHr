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
        $table->integer('employee_id');
        $table->integer('language_id');
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
