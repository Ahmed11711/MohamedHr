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
        Schema::create('advanced_interviews', function (Blueprint $table) {
            $table->id();
            $table->enum('interview_type', ['onsite', 'online'])->default('onsite');
            $table->integer('round_number')->default(1);
            $table->integer('round_rating')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advanced_interviews');
    }
};
