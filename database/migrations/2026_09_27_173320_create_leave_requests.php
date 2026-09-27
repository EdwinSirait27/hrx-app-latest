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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();
            $table->foreignId('leave_type_id')
                ->constrained('leave_types')
                ->restrictOnDelete();
            $table->date('leave_request_start_date');
            $table->date('leave_request_end_date');
            $table->decimal('leave_request_total_days', 5, 1);
            $table->text('leave_request_reason')->nullable();
            $table->string('leave_request_attachment')->nullable();
            $table->string('leave_request_status')
                ->default('draft');
            $table->timestamp('leave_request_submitted_at')
                ->nullable();
            $table->timestamp('leave_request_cancelled_at')
                ->nullable();
            $table->foreignId('leave_request_cancelled_by')
                ->nullable()
                ->constrained('employees')
                ->nullOnDelete();
            $table->text('leave_request_cancellation_reason')
                ->nullable();
            $table->timestamps();
            $table->index([
                'employee_id',
                'leave_request_status',
            ]);
            $table->index([
                'leave_request_start_date',
                'leave_request_end_date',
            ]);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
