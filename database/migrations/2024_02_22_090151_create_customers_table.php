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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('custId', 10);
            $table->string('lastName', 30);
            $table->string('firstName', 30);
            $table->string('middleName', 30);
            $table->string('mobileno', 30);
            $table->string('address1', 50);
            $table->string('address2', 50);
            $table->string('city', 50);
            $table->string('vip', 3);
            $table->integer('trancount');
            $table->decimal('totalsales', 10, 2);
            $table->string('notes', 255);
            $table->string('remark', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
