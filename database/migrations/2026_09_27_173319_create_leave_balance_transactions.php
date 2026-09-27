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
        Schema::create('leave_balance_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_balance_id')
                ->constrained('leave_balances')
                ->cascadeOnDelete();
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();
            $table->foreignId('leave_type_id')
                ->constrained('leave_types')
                ->restrictOnDelete();
            $table->foreignId('leave_request_id')
                ->nullable()
                ->constrained('leave_requests')
                ->nullOnDelete();
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('employees')
                ->nullOnDelete();
            $table->string('leave_balance_transaction_type');
            $table->decimal('leave_balance_transaction_days', 5, 1);
            $table->text('leave_balance_transaction_description')
                ->nullable();
            $table->timestamps();
            $table->index([
                'employee_id',
                'leave_type_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_balance_transactions');
    }
};
