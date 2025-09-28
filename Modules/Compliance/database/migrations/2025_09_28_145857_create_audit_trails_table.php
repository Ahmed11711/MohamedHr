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
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
               $table->enum('change_type', ['Create', 'Update', 'Delete', 'Access']); // نوع التغيير
            $table->dateTime('change_date'); // تاريخ التغيير
            $table->text('change_reason')->nullable(); // سبب التغيير
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_trails');
    }
};
