<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BranchSales;
use Illuminate\Http\Request;

class BranchSalesController extends Controller
{
    public function indexSales()
    {
        $data = BranchSales::all();
        if (empty($data)) {
            return response()->json([
                'message' => 'Sales is Empty',
            ], 204);
        }
        return response()->json($data, 200);
    }

    public function getBranchSales($id)
    {
        $branchSales_id = BranchSales::find($id);

        if ($branchSales_id == null) {
            return response()->json(['message' => 'Not found!'], 404);
        }
        return response()->json($branchSales_id);
    }
    public function createBranchSales(Request $request)
    {
        $request->validate([
            'shopId' => 'required|string|max:10',
            'branchId' => 'required|string|max:10',
            'budget' => 'required|decimal',
            'closedBy' => 'required|string|max:10',
            'status' => 'required|integer',
            'date' => 'required',
            'TotalStaff' => 'required|integer',
            'totalSlip' => 'required|integer',
            'TotalLoadQty' => 'required|integer',
            'totalLoadAmt' => 'required|decimal',
            'totalsales' => 'required|decimal',
            'totalDetergent' => 'required|decimal',
            'totalFabcon' => 'required|decimal',
            'totalBleach' => 'required|decimal',
            'totalBounce' => 'required|decimal',
            'totalBabad' => 'required|decimal',
            'totalPerla' => 'required|decimal',
            'totalDryClean' => 'required|decimal',
            'totalOther' => 'required|decimal',
            'totalFood' => 'required|decimal',
            'totalBeverage' => 'required|decimal',
            'totalLunch' => 'required|decimal',
            'totalExpOther' => 'required|decimal',
            'totalExtraExpense' => 'required|decimal',
            'totalNetSales' => 'required|decimal',
            'totalCashpaid' => 'required|decimal',
            'totalCashclaimed' => 'required|decimal',
            'totalCashtoday' => 'required|decimal',
            'totalCashout' => 'required|decimal',
            'totalCashtomorrow' => 'required|decimal',
            'totalGcashpaid' => 'required|decimal',
            'totalGcashclaimed' => 'required|decimal',
            'totalBankpaid' => 'required|decimal',
            'totalBankclaimed' => 'required|decimal',
            'totalBankpayment' => 'required|decimal',
            'totalUnpaidtoday' => 'required|decimal',
            'TotalpdSales' => 'required|decimal',
        ]);

        $branchsales = BranchSales::create([
            'shopId' => $request->shopId,
            'branchId' => $request->branchId,
            'budget' => $request->branchId,
            'closedBy' => $request->budget,
            'status' => $request->status,
            'date' => $request->date,
            'TotalStaff' => $request->TotalStaff,
            'totalSlip' => $request->totalSlip,
            'TotalLoadQty' => $request->TotalLoadQty,
            'totalLoadAmt' => $request->totalLoadAmt,
            'totalsales' => $request->totalsales,
            'totalDetergent' => $request->totalDetergent,
            'totalFabcon' => $request->totalFabcon,
            'totalBleach' => $request->totalBleach,
            'totalBounce' => $request->totalBounce,
            'totalBabad' => $request->totalBouncetotalBabad,
            'totalPerla' => $request->totalPerla,
            'totalDryClean' => $request->totalDryClean,
            'totalOther' => $request->totalOther,
            'totalFood' => $request->totalFood,
            'totalBeverage' => $request->totalBeverage,
            'totalLunch' => $request->totalLunch,
            'totalExpOther' => $request->totalExpOther,
            'totalExtraExpense' => $request->totalExtraExpense,
            'totalNetSales' => $request->totalNetSales,
            'totalCashpaid' => $request->totalCashpaid,
            'totalCashclaimed' => $request->totalCashclaimed,
            'totalCashtoday' => $request->totalCashtoday,
            'totalCashout' => $request->totalCashout,
            'totalCashtomorrow' => $request->totalCashtomorrow,
            'totalGcashpaid' => $request->totalGcashpaid,
            'totalGcashclaimed' => $request->totalGcashclaimed,
            'totalBankpaid' => $request->totalBankpaid,
            'totalBankclaimed' => $request->totalBankclaimed,
            'totalBankpayment' => $request->totalBankpayment,
            'totalUnpaidtoday' => $request->totalUnpaidtoday,
            'TotalpdSales' => $request->TotalpdSales,
        ]);

        return response()->json($branchsales, 200);
    }

    public function updateBranchsales(Request $request, $id)
    {
        $request->validate([
            'shopId' => 'required|string|max:10',
            'branchId' => 'required|string|max:10',
            'budget' => 'required|decimal',
            'closedBy' => 'required|string|max:10',
            'status' => 'required|integer',
            'date' => 'required',
            'TotalStaff' => 'required|integer',
            'totalSlip' => 'required|integer',
            'TotalLoadQty' => 'required|integer',
            'totalLoadAmt' => 'required|decimal',
            'totalsales' => 'required|decimal',
            'totalDetergent' => 'required|decimal',
            'totalFabcon' => 'required|decimal',
            'totalBleach' => 'required|decimal',
            'totalBounce' => 'required|decimal',
            'totalBabad' => 'required|decimal',
            'totalPerla' => 'required|decimal',
            'totalDryClean' => 'required|decimal',
            'totalOther' => 'required|decimal',
            'totalFood' => 'required|decimal',
            'totalBeverage' => 'required|decimal',
            'totalLunch' => 'required|decimal',
            'totalExpOther' => 'required|decimal',
            'totalExtraExpense' => 'required|decimal',
            'totalNetSales' => 'required|decimal',
            'totalCashpaid' => 'required|decimal',
            'totalCashclaimed' => 'required|decimal',
            'totalCashtoday' => 'required|decimal',
            'totalCashout' => 'required|decimal',
            'totalCashtomorrow' => 'required|decimal',
            'totalGcashpaid' => 'required|decimal',
            'totalGcashclaimed' => 'required|decimal',
            'totalBankpaid' => 'required|decimal',
            'totalBankclaimed' => 'required|decimal',
            'totalBankpayment' => 'required|decimal',
            'totalUnpaidtoday' => 'required|decimal',
            'TotalpdSales' => 'required|decimal',
        ]);

        $branchsales = BranchSales::find($id)->first();

        if ($branchsales == null) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $branchsales->update($request->all());
        return response()->json(['message' => 'Update successfully!', 'data' => $branchsales], 200);
    }

    public function deleteBranchSales($id)
    {
        $delete_branchSales = BranchSales::find($id);
        if ($delete_branchSales == null) {
            return response()->json(['message' => 'Cannot delete Branch Sales'], 500);
        }

        $delete_branchSales->delete();
        return response()->json(['message' => 'Branch Sales successfully deleted!'], 200);
    }
}
