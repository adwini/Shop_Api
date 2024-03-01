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
            $table->string('slipno', 15);
            $table->string('serviceType', 1);
            $table->decimal('loadsqty', 10, 2);
            $table->decimal('loadsAmount', 10, 2);
            $table->decimal('loadsTotal', 10, 2);
            $table->decimal('detergentQty', 10, 2);
            $table->decimal('detergentAmount', 10, 2);
            $table->decimal('detergentTotal', 10, 2);
            $table->decimal('fabconQty', 10, 2);
            $table->decimal('fabconAmount', 10, 2);
            $table->decimal('fabconTotal', 10, 2);
            $table->decimal('bleachAty', 10, 2);
            $table->decimal('bleachAmount', 10, 2);
            $table->decimal('bleachTotal', 10, 2);
            $table->decimal('bounceAty', 10, 2);
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
