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
        Schema::create('talent', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->text('skills')->nullable();
            $table->enum('talent_status', ['available', 'assigned', 'inactive'])->default('available');
            $table->date('addition_date')->nullable();
            $table->string('attachment')->nullable();   
            $table->timestamps();
        });
    }

    /**F
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talent');
    }
};
