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
        Schema::create('training_budget_management', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id'); // course id
            $table->decimal('allocated_budget', 10, 2);
            $table->decimal('spent_budget', 10, 2)->default(0);
            $table->decimal('budget_variance', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_budget_management');
    }
};
