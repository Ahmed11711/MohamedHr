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
        Schema::create('employee_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_id');
            $table->integer('candidate_id');
            $table->enum('check_type', ['identity', 'criminal', 'employment'])->default('identity');
            $table->string('check_result')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_references');
    }
};
