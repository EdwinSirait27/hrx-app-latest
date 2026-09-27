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
        Schema::create('leave_request_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_request_id')
                ->constrained('leave_requests')
                ->cascadeOnDelete();
            $table->foreignId('approver_id')
                ->constrained('employees')
                ->restrictOnDelete();
            $table->unsignedInteger('leave_request_approval_level');
            $table->string('leave_request_approval_status')
                ->default('pending');
            $table->timestamp('leave_request_approval_approved_at')
                ->nullable();
            $table->timestamp('leave_request_approval_rejected_at')
                ->nullable();
            $table->text('leave_request_approval_rejection_reason')
                ->nullable();
            $table->text('leave_request_approval_remarks')
                ->nullable();
            $table->timestamps();
            $table->unique([
                'leave_request_id',
                'leave_request_approval_level',
            ]);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_request_approvals');
    }
};
