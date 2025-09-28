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
        Schema::create('candidate_relations', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->date('interaction_date')->nullable();
            $table->enum('interaction_type', ['call', 'email', 'meeting', 'chat'])->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_relations');
    }
};
