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
        Schema::create('branchsales', function (Blueprint $table) {
            $table->id();
            $table->string('shopId', 10);
            $table->string('branchId', 10);
            $table->decimal('budget', 12, 2);
            $table->string('closedBy', 10);
            $table->integer('status');
            $table->date('date');
            $table->integer('TotalStaff');
            $table->integer('totalSlip');
            $table->integer('TotalLoadQty');
            $table->decimal('totalLoadAmt', 10, 2);
            $table->decimal('totalsales', 10, 2);
            $table->decimal('totalDetergent', 10, 2);
            $table->decimal('totalFabcon', 10, 2);
            $table->decimal('totalBleach', 10, 2);
            $table->decimal('totalBounce', 10, 2);
            $table->decimal('totalBabad', 10, 2);
            $table->decimal('totalPerla', 10, 2);
            $table->decimal('totalDryClean', 10, 2);
            $table->decimal('totalOther', 10, 2);
            $table->decimal('totalFood', 10, 2);
            $table->decimal('totalBeverage', 10, 2);
            $table->decimal('totalLunch', 10, 2);
            $table->decimal('totalExpOther', 10, 2);
            $table->decimal('totalExtraExpense', 10, 2);
            $table->decimal('totalNetSales', 10, 2);
            $table->decimal('totalCashpaid', 10, 2);
            $table->decimal('totalCashclaimed', 10, 2);
            $table->decimal('totalCashtoday', 10, 2);
            $table->decimal('totalCashout', 10, 2);
            $table->decimal('totalCashtomorrow', 10, 2);
            $table->decimal('totalGcashpaid', 10, 2);
            $table->decimal('totalGcashclaimed', 10, 2);
            $table->decimal('totalBankpaid', 10, 2);
            $table->decimal('totalBankclaimed', 10, 2);
            $table->decimal('totalBankpayment', 10, 2);
            $table->decimal('totalUnpaidtoday', 10, 2);
            $table->decimal('TotalpdSales', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branchsales');
    }
};
