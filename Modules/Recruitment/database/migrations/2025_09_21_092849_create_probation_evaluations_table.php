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
        Schema::create('probation_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('evaluation_date')->nullable();
            $table->integer('evaluation_rating')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('probation_evaluations');
    }
};
