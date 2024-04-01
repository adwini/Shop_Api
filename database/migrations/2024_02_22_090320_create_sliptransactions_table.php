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
        Schema::create('sliptransactions', function (Blueprint $table) {
            $table->id();
            $table->string('shopId', 10);
            $table->string('branchId', 10);
            $table->date('date');
            $table->time('time');
            $table->string('custId', 10);
            $table->string('receivedBy', 10);
            $table->dateTime('receivedDateTime');
            $table->string('slipNo', 15);
            $table->string('serviceType', 1);
            $table->decimal('loadsQty', 10, 2);
            $table->decimal('loadsAmount', 10, 2);
            $table->decimal('loadsTotal', 10, 2);
            $table->decimal('detergentQty', 10, 2);
            $table->decimal('detergentAmount', 10, 2);
            $table->decimal('detergentTotal', 10, 2);
            $table->decimal('fabconQty', 10, 2);
            $table->decimal('fabconAmount', 10, 2);
            $table->decimal('fabconTotal', 10, 2);
            $table->decimal('bleachQty', 10, 2);
            $table->decimal('bleachAmount', 10, 2);
            $table->decimal('bleachTotal', 10, 2);
            $table->decimal('bounceQty', 10, 2);
            $table->decimal('bounceAmount', 10, 2);
            $table->decimal('bounceTotal', 10, 2);
            $table->decimal('babadQty', 10, 2);
            $table->decimal('babadAmount', 10, 2);
            $table->decimal('babadTotal', 10, 2);
            $table->decimal('perlaQty', 10, 2);
            $table->decimal('perlAmount', 10, 2);
            $table->decimal('perlaTotal', 10, 2);
            $table->decimal('dryQty', 10, 2);
            $table->decimal('dryAmount', 10, 2);
            $table->decimal('dryTotal', 10, 2);
            $table->decimal('othersQty', 10, 2);
            $table->decimal('othersAmount', 10, 2);
            $table->decimal('othersTotal', 10, 2);
            $table->decimal('foodQty', 10, 2);
            $table->decimal('foodAmount', 10, 2);
            $table->decimal('foodTotal', 10, 2);
            $table->decimal('beverageQty', 10, 2);
            $table->decimal('beverageAmount', 10, 2);
            $table->decimal('beverageTotal', 10, 2);
            $table->decimal('totalAmount', 10, 2);
            $table->decimal('amountPaid', 10, 2);
            $table->decimal('gcash', 10, 2);
            $table->decimal('cash', 10, 2);
            $table->decimal('bank', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->decimal('gcash1', 10, 2);
            $table->decimal('cash1', 10, 2);
            $table->decimal('bank1', 10, 2);
            $table->decimal('fullAmountPaid', 10, 2);
            $table->date('fullyPaidDate');
            $table->string('foldedBy', 10);
            $table->dateTime('foldedDateTime');
            $table->string('babadBY', 10);
            $table->dateTime('babadDateTime');
            $table->string('releasedBy', 10);
            $table->dateTime('releasedDateTime');
            $table->string('claimedBy', 10);
            $table->dateTime('claimedDateTime');
            $table->string('notes', 255);
            $table->string('remark', 255);
            $table->string('specialInstruction', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliptransactions');
    }
};
