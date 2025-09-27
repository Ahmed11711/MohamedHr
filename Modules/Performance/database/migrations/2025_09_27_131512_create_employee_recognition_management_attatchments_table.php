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
        Schema::create('employee_recognition_management_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_recognition_management_id'); 
            $table->string('attatchment');
            $table->string('attachment_type')->nullable();
            $table->string('attachment_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_recognition_management_attatchments');
    }
};
