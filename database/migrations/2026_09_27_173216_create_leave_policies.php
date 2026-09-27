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
        Schema::create('leave_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_type_id')
                ->constrained('leave_types')
                ->cascadeOnDelete();
            $table->string('leave_policy_name');
            $table->decimal('leave_policy_entitled_days', 5, 1)
                ->default(0);
            $table->unsignedInteger('leave_policy_minimum_service_months')
                ->default(0);
            $table->boolean('leave_policy_is_paid')
                ->default(true);
            $table->boolean('leave_policy_can_carry_forward')
                ->default(false);
            $table->decimal('leave_policy_carry_forward_limit', 5, 1)
                ->default(0);
            $table->unsignedInteger('leave_policy_carry_forward_expiry_months')
                ->nullable();
            $table->unsignedInteger('leave_policy_minimum_notice_days')
                ->default(0);
            $table->unsignedInteger('leave_policy_maximum_consecutive_days')
                ->nullable();
            $table->boolean('leave_policy_requires_attachment')
                ->default(false);
            $table->boolean('leave_policy_is_active')
                ->default(true);
            $table->timestamps();
            $table->index([
                'leave_type_id',
                'leave_policy_is_active',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_policies');
    }
};
