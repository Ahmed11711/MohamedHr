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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id');

            $table->string('name');
            $table->integer('certificate_type_id');

            $table->string('certificate_number')->unique();
            $table->string('place_of_issuance');
            $table->string('type_of_issuance')->nullable();
            $table->string('degree')->nullable();
            $table->date('date_of_issuance');
            $table->date('expiry_date')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->string('description')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
