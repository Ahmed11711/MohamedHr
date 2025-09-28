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
        Schema::create('bulk_hirings', function (Blueprint $table) {
            $table->id();
            $table->integer('jobs_count')->default(0); // عدد الوظائف
            $table->string('jobs_title'); // المسمى الوظيفي
            $table->enum('batch_status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulk_hirings');
    }
};
