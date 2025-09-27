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
        Schema::create('learning_management_integration_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('learning_management_integration_id'); // FK to learning_management_integrations
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
        Schema::dropIfExists('learning_management_integration_attatchments');
    }
};
