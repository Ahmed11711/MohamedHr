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
        Schema::create('compliance_reports', function (Blueprint $table) {
            $table->id();
            $table->enum('report_type', ['monthly', 'quarterly', 'annual', 'incident', 'other'])
                ->default('other');         
            $table->date('report_date');     
            $table->enum('report_status', ['draft', 'submitted', 'approved', 'rejected'])
                ->default('draft');       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_reports');
    }
};
