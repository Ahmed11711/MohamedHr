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
        Schema::create('competency_management_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('competency_management_id'); // Competency Management in competency_management
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
        Schema::dropIfExists('competency_management_attatchments');
    }
};
