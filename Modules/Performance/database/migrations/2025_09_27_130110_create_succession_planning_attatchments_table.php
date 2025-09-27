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
        Schema::create('succession_planning_attatchments', function (Blueprint $table) {
            $table->id();
            $table->integer('succession_planning_id'); // Succession Planning in succession_plannings
            $table->string('attatchment'); // Path to the attachment file
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
        Schema::dropIfExists('succession_planning_attatchments');
    }
};
