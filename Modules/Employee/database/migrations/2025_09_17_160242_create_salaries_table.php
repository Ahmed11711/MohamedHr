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
            $table->integer('employee_id');
            $table->decimal('amount');
            $table->integer('currency_id');
            $table->integer('salary_type_id');
            $table->integer('payment_method_id');
            $table->string('bank_name')->nullable();
            $table->string('bank_number')->nullable();
            $table->text('notes')->nullable();
            $table->string('cost_center')->nullable();
            $table->string('attachment')->nullable();
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
