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
        Schema::create('ai_driven_performance_insight_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('ai_driven_performance_insight_id'); // FK to ai_driven_performance_insights
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
        Schema::dropIfExists('ai_driven_performance_insight_attatchments');
    }
};
