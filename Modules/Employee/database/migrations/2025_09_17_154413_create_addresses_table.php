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
    Schema::create('addresses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employeeinfo_id')->constrained('employeeinfos')->onDelete('cascade');
        $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
        $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
        $table->string('province')->nullable();
        $table->string('street_address');
        $table->string('building_number')->nullable();
        $table->string('building_type')->nullable();
        $table->string('building_name')->nullable();
        $table->string('zip_code')->nullable();
        $table->text('notes')->nullable();
        $table->string('attachment')->nullable();
        $table->enum('type', ['permanent', 'current']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
