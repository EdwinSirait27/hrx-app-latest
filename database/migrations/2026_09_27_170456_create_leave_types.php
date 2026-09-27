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
       Schema::create('leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('leave_type_name')->nullable();
            $table->string('leave_type_code')->unique()->nullable();
            $table->text('leave_type_description')->nullable();
            $table->decimal('leave_type_default_days', 5, 1)
                ->default(0);
            $table->boolean('leave_type_is_paid')
                ->default(true);
            $table->boolean('leave_type_requires_attachment')
                ->default(false);
            $table->boolean('leave_type_is_active')
                ->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_types');
    }
};
