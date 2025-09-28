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
        Schema::create('recruitment_plans', function (Blueprint $table) {
            $table->id();
            $table->string('time_period');
            $table->integer('required_jobs_count');
            $table->decimal('recruitment_budget', 12, 2)->nullable();
            $table->enum('priority', ['low', 'medium', 'high'])->nullable();
            $table->string('turnover_forecast')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_plans');
    }
};
