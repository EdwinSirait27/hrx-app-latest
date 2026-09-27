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
        Schema::create('gradings', function (Blueprint $table) {
            $table->id();
            $table->string('grading_name')->nullable();
            $table->string('grading_code')->nullable();
            $table->integer('level')->nullable();
            $table->decimal('grading_meal_allowance', 15, 2)->default(0);

            $table->unique(
                ['grading_name', 'grading_code'],
                'gradings_grading_name_grading_code_unique'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradings');
    }
};
