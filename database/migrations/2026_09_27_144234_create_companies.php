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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_photo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_nickname')->nullable();
            $table->string('company_npwp')->nullable();
            $table->string('company_header')->nullable();
            $table->string('company_phone_number')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_mail')->nullable();
            $table->string('company_remark')->nullable();
            $table->text('company_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
