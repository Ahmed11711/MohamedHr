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
        Schema::create('training_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('training_name');
            $table->integer('training_type_id');
            $table->integer('program_id');
            $table->integer('duration')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->string('sponsor')->nullable();
            $table->string('trainer')->nullable();
            $table->string('training_partner')->nullable();
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('address')->nullable();
            $table->string('import_in')->nullable();
            $table->string('result')->nullable();
            $table->string('institution')->nullable();
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traning_employees');
    }
};
