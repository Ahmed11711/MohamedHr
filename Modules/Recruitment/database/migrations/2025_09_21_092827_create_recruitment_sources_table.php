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
        Schema::create('recruitment_sources', function (Blueprint $table) {
            $table->id();
            $table->string('source_name');
            $table->enum('source_type', ['internal', 'external', 'referral'])->nullable();
            $table->decimal('source_cost', 10, 2)->nullable();
            $table->string('source_effectiveness')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_sources');
    }
};
