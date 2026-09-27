<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_locations', function (Blueprint $table) {
            $table->id();
           $table->foreignId('location_id')
                ->references('id')->on('locations')
                ->onDelete('cascade');
            $table->foreignId('employee_id')
                ->references('id')->on('employees')
                ->onDelete('cascade');
            $table->boolean('is_primary')->default(false);
            $table->unique(['employee_id', 'location_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_locations');
    }
};
