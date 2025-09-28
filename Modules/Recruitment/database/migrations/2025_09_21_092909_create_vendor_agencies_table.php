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
        Schema::create('vendor_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('agency_name'); // اسم الوكالة
            $table->string('contract')->nullable(); // عقد الوكالة
            $table->string('performance')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_agencies');
    }
};
