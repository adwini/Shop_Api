<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchSales extends Model
{
    use HasFactory;

    protected $table = 'branchsales';
    protected $primaryKey = 'id';

    protected $fillable = [
        'shopId',
        'branchId',
        'budget',
        'closedBy',
        'status',
        'date',
        'TotalStaff',
        'totalSlip',
        'TotalLoadQty',
        'totalLoadAmt',
        'totalsales',
        'totalDetergent',
        'totalFabcon',
        'totalBleach',
        'totalBounce',
        'totalBabad',
        'totalPerla',
        'totalDryClean',
        'totalOther',
        'totalFood',
        'totalBeverage',
        'totalLunch',
        'totalExpOther',
        'totalExtraExpense',
        'totalNetSales',
        'totalCashpaid',
        'totalCashclaimed',
        'totalCashtoday',
        'totalCashout',
        'totalCashtomorrow',
        'totalGcashpaid',
        'totalGcashclaimed',
        'totalBankpaid',
        'totalBankclaimed',
        'totalBankpayment',
        'totalUnpaidtoday',
        'TotalpdSales',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d'
    ];
}
