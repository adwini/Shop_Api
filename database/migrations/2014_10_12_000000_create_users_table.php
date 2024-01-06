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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('shopId', 10);
            $table->string('empId', 10);
            $table->string('lastName', 30);
            $table->string('firstName', 30);
            $table->string('middleName', 30);
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('active');
            // $table->enum('role',  ['superAdmin', 'admin', 'manager', 'employee'])->default('employee');
            $table->json('restriction')->nullable();
            $table->date('dateHired');
            $table->decimal('salary', 10, 2);
            $table->string('notes', 255);
            $table->string('remark', 255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
