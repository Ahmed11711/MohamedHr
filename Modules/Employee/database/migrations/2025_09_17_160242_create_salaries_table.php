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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->decimal('amount');
            $table->foreignId('currency_id')->constrained('currencies')->onDelete('cascade');
            $table->foreignId('salary_type_id')->constrained('salary_types')->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')->onDelete('cascade');
            $table->string('bank_name')->nullable();
            $table->string('bank_number')->nullable();
            $table->text('notes')->nullable();
            $table->string('cost_center')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
