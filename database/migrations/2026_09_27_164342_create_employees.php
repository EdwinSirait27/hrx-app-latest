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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->foreignId('grading_id')
                ->nullable()
                ->constrained('gradings')
                ->nullOnDelete();
            $table->foreignId('bank_id')
                ->nullable()
                ->constrained('banks')
                ->nullOnDelete();
            $table->string('employee_name')->nullable();
            $table->string('employee_id_number')->unique();
            $table->string('employee_photo')->nullable();
            $table->string('employee_kk_photo')->nullable();
            $table->string('employee_ktp_photo')->nullable();
            $table->string('employee_signature')->nullable();
            $table->string('employee_attendance_type')->default('store_bound');
            $table->string('employee_employment_type')->nullable();
            $table->date('employee_join_date')->nullable();
            $table->date('employee_end_date')->nullable();
            $table->text('employee_resign_note')->nullable();
            $table->string('employee_marital_status')->nullable();
            $table->string('employee_child')->nullable();
            $table->string('employee_phone_number')->nullable();
            $table->string('employee_nik')->nullable();
            $table->string('employee_kk_number')->nullable();
            $table->string('employee_blood_type')->nullable();
            $table->string('employee_gender')->nullable();
            $table->boolean('employee_can_approve')->default(false);
            $table->date('employee_date_of_birth')->nullable();
            $table->string('employee_place_of_birth')->nullable();
            $table->string('employee_biological_mother_name')->nullable();
            $table->string('employee_religion')->nullable();
            $table->text('employee_current_address')->nullable();
            $table->text('employee_ktp_address')->nullable();
            $table->string('employee_last_education')->nullable();
            $table->string('employee_last_institution')->nullable();
            $table->string('employee_npwp')->nullable()->unique();
            $table->string('employee_bpjs_kesehatan')->nullable()->unique();
            $table->string('employee_bpjs_ketenagakerjaan')->nullable()->unique();
            $table->string('employee_bank_account_number')->nullable()->unique();
            $table->string('employee_company_email')->nullable();
            $table->string('employee_emergency_contact_name')->nullable();
            $table->string('employee_emergency_phone_number')->nullable();
            $table->string('employee_status')->nullable()->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
