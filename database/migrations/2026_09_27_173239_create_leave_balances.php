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
       Schema::create('leave_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();
            $table->foreignId('leave_type_id')
                ->constrained('leave_types')
                ->restrictOnDelete();
            $table->unsignedInteger('leave_balance_year')->nullable();
            $table->decimal('leave_balance_entitled_days', 5, 1)
                ->default(0);
            $table->decimal('leave_balance_carried_forward_days', 5, 1)
                ->default(0);
            $table->decimal('leave_balance_adjusted_days', 5, 1)
                ->default(0);
            $table->decimal('leave_balance_used_days', 5, 1)
                ->default(0);
            $table->decimal('leave_balance_pending_days', 5, 1)
                ->default(0);
            $table->timestamps();
            $table->unique([
                'employee_id',
                'leave_type_id',
                'leave_balance_year',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_balances');
    }
};
