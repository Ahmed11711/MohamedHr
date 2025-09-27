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
        Schema::create('employeeinfos', function (Blueprint $table) {
            $table->id();
            $table->integer('facility_id');
            $table->boolean('saudi_national')->default(0);
            $table->json('firstName');
            $table->json('secondName')->nullable();
            $table->json('thirdName')->nullable();
            $table->json('lastName')->nullable();

            $table->date('dob')->nullable();
            $table->integer('country_id');

            $table->string('national_id')->unique();
            $table->date('ex_national_id')->nullable();

            $table->integer('marital_status_id');
            $table->enum('gender', ['male', 'female'])->nullable();

            $table->string('professional_email')->unique()->nullable();
            $table->string('personal_email')->unique()->nullable();

            $table->integer('nationality_id');
            $table->integer('religion_id');
            $table->string('passport_number')->unique()->nullable();
            $table->enum('passport_type', ['regular', 'diplomatic', 'service'])->nullable();
            $table->string('issuance_location')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('personal_photo')->nullable();
            $table->date('last_date_update_personal_photo')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeeinfos');
    }
};
