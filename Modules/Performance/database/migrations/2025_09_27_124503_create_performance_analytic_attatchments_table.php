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
        Schema::create('performance_analytic_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('performance_analytic_id'); // Performance Analytic in performance_analytics
            $table->string('attachment'); // Path to the attachment file
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
        Schema::dropIfExists('performance_analyti_attatchments');
    }
};
