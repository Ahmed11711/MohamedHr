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
        Schema::create('retirement_plan_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->string('plan_type');                     
            $table->decimal('company_contribution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirement_plan_management');
    }
};
