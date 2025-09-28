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
        Schema::create('recruitment_insights', function (Blueprint $table) {
            $table->id();
            $table->string('analysis_type'); // نوع التحليل
            $table->json('input_data')->nullable(); // البيانات المدخلة
            $table->text('output')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_insights');
    }
};
