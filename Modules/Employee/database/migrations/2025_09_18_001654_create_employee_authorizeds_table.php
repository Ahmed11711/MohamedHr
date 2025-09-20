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
        Schema::create('employee_authorizeds', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->constrained('employees')->onDelete('cascade');

            $table->integer('authorized_approve_expenses_id')
                ->nullable()
              ;

            $table->integer('authorized_approve_shift_id')
                ->nullable()
               ;
            $table->integer('authorized_approve_holidays_id')
                ->nullable()
            ;

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_authorizeds');
    }
};
