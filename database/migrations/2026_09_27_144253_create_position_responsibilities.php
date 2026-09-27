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
        Schema::create('position_responsibilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')
                ->references('id')->on('positions')
                ->onDelete('cascade');
            $table->enum('type', ['key_respon', 'qualification'])->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_responsibilities');
    }
};
