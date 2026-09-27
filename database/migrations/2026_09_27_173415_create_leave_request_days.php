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
        Schema::create('leave_request_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_request_id')
                ->constrained('leave_requests')
                ->cascadeOnDelete();
            $table->date('leave_request_day_date');
            $table->decimal('leave_request_day_value', 2, 1)
                ->default(1);
            $table->string('leave_request_day_type')
                ->default('leave');
            $table->string('leave_request_day_period')
                ->nullable();
            $table->timestamps();
            $table->unique([
                'leave_request_id',
                'leave_request_day_date',
            ]);
            $table->index('leave_request_day_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_request_days');
    }
};
