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
        Schema::create('financial_integrations', function (Blueprint $table) {
            $table->id();
            $table->string('system_name'); // اسم النظام
            $table->string('integration_type'); // نوع التكامل
            $table->enum('status', ['active', 'inactive', 'pending', 'error'])->default('active');
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_integrations');
    }
};
