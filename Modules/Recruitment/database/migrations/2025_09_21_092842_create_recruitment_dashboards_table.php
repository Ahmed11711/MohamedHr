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
        Schema::create('recruitment_dashboards', function (Blueprint $table) {
            $table->id();
            $table->integer('total_applications')->default(0); // إجمالي الطلبات
            $table->integer('average_time_to_hire')->default(0); // وقت التوظيف المتوسط (days)
            $table->decimal('hire_rate', 5, 2)->default(0); // نسبة التوظيف %
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_dashboards');
    }
};
