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
        Schema::create('continuous_performance_management_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('continuous_performance_management_id'); // FK to continuous_performance_managements
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
        Schema::dropIfExists('continuous_performance_management_attatchments');
    }
};
