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
        Schema::create('internal_recruitments', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');
            $table->integer('position_id');
            $table->enum('status', ['under_review', 'approved', 'rejected', 'in_progress'])->default('under_review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.D
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_recruitments');
    }
};
