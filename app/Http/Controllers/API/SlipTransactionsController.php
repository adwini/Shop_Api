<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\SlipTransactions;
use Illuminate\Http\Request;

class SlipTransactionsController extends Controller
{
    //TODO:: CRUP OPERATIONS

    public function indexSlipTransactions()
    {
        $data = SlipTransactions::all();

        if (empty($data)) {
            return response()->json([
                'message' => 'No Branch is listed',
            ], 204);
        }
        return response()->json($data, 200);
    }

    public function getSlipTransactions(string $branchId)
    {
        $branch_id = Branch::where('branchId', '=', $branchId)->first();

        if ($branch_id == null) {
            return response()->json(['message' => 'Not found!'], 404);
        }
        return response()->json($branch_id, 200);
    }

    public function createSlipTransactions(Request $request)
    {
        $request->validate([
            'shopId' => 'required|string|max:10',
            'branchId' => 'required|string|max:10',
            'date' => 'required',
            'time' => 'required',
            'custId' => 'required|string|max:10',
            'receivedBy' => 'required|string|max:10',
            'receivedDateTime' => 'required',
            'slipno' => 'required|string|max:15',
            'serviceType' => 'required|string|max:1',
            'loadsqty' => 'required|decimal',
            'loadsAmount' => 'required|decimal',
            'loadsTotal' => 'required|decimal',
            'detergentQty' => 'required|decimal',
            'detergentAmount' => 'required|decimal',
            'detergentTotal' => 'required|decimal',
            'fabconQty' => 'required|decimal',
            'fabconAmount' => 'required|decimal',
            'fabconTotal' => 'required|decimal',
            'bleachAty' => 'required|decimal',
            'bleachAmount' => 'required|decimal',
            'bleachTotal' => 'required|decimal',
            'bounceAty' => 'required|decimal',
            'bounceAmount' => 'required|decimal',
            'bounceTotal' => 'required|decimal',
            'babadQty' => 'required|decimal',
            'babadAmount' => 'required|decimal',
            'babadTotal' => 'required|decimal',
            'perlaQty' => 'required|decimal',
            'perlAmount' => 'required|decimal',
            'perlaTotal' => 'required|decimal',
            'dryQty' => 'required|decimal',
            'dryAmount' => 'required|decimal',
            'dryTotal' => 'required|decimal',
            'othersQty' => 'required|decimal',
        ]);

        $slipTransaction = SlipTransactions::create([
            'shopId' => $request->shopId,
            'branchId' => $request->branchId,
            'date' => $request->date,
            'time' => $request->time,
            'custId' => $request->custId,
            'receivedBy' => $request->receivedBy,
            'receivedDateTime' => $request->receivedDateTime,
            'slipno' => $request->slipno,
            'serviceType' => $request->serviceType,
            'loadsqty' => $request->loadsqty,
            'loadsAmount' => $request->loadsAmount,
            'loadsTotal' => $request->loadsTotal,
            'detergentQty' => $request->detergentQty,
            'detergentAmount' => $request->detergentAmount,
            'detergentTotal' => $request->detergentTotal,
            'fabconQty' => $request->fabconQty,
            'fabconAmount' => $request->fabconAmount,
            'fabconTotal' => $request->fabconTotal,
            'bleachAty' => $request->bleachAty,
            'bleachAmount' => $request->bleachAmount,
            'bleachTotal' => $request->bleachTotal,
            'bounceAty' => $request->bounceAty,
            'bounceAmount' => $request->bounceAmount,
            'bounceTotal' => $request->bounceTotal,
            'babadQty' => $request->babadQty,
            'babadAmount' => $request->babadAmount,
            'babadTotal' => $request->babadTotal,
            'perlaQty' => $request->perlaQty,
            'perlAmount' => $request->perlAmount,
            'perlaTotal' => $request->perlaTotal,
            'dryQty' => $request->dryQty,
            'dryAmount' => $request->dryAmount,
            'dryTotal' => $request->dryTotal,
            'othersQty' => $request->othersQty,
        ]);

        return response()->json($slipTransaction, 200);
    }
    public function undateSlipTransaction(Request $request, $id)
    {
        $request->validate([
            'shopId' => 'required|string|max:10',
            'branchId' => 'required|string|max:10',
            'date' => 'required',
            'time' => 'required',
            'custId' => 'required|string|max:10',
            'receivedBy' => 'required|string|max:10',
            'receivedDateTime' => 'required',
            'slipno' => 'required|string|max:15',
            'serviceType' => 'required|string|max:1',
            'loadsqty' => 'required|decimal',
            'loadsAmount' => 'required|decimal',
            'loadsTotal' => 'required|decimal',
            'detergentQty' => 'required|decimal',
            'detergentAmount' => 'required|decimal',
            'detergentTotal' => 'required|decimal',
            'fabconQty' => 'required|decimal',
            'fabconAmount' => 'required|decimal',
            'fabconTotal' => 'required|decimal',
            'bleachAty' => 'required|decimal',
            'bleachAmount' => 'required|decimal',
            'bleachTotal' => 'required|decimal',
            'bounceAty' => 'required|decimal',
            'bounceAmount' => 'required|decimal',
            'bounceTotal' => 'required|decimal',
            'babadQty' => 'required|decimal',
            'babadAmount' => 'required|decimal',
            'babadTotal' => 'required|decimal',
            'perlaQty' => 'required|decimal',
            'perlAmount' => 'required|decimal',
            'perlaTotal' => 'required|decimal',
            'dryQty' => 'required|decimal',
            'dryAmount' => 'required|decimal',
            'dryTotal' => 'required|decimal',
            'othersQty' => 'required|decimal',
        ]);

        $slipTransaction = SlipTransactions::where('branchId', '=', $id)->first();
        if ($slipTransaction == null) {
            return response()->json(['message' => 'Cannot find shop'], 404);
        }

        $slipTransaction->update($request->all());

        return response()->json(['message' => 'Update Slip Transaction successfully!', 'data' => $slipTransaction], 200);
    }

    public function deleteSlipTransactions(string $id)
    {
        $delete_slipTransactions = SlipTransactions::find($id);

        if ($delete_slipTransactions == null) {
            return response()->json(['message' => 'Cannot find Slip Transactions'], 404);
        }
        $delete_slipTransactions->delete();
        return response()->json(['message' => 'Slip Transactions Deleted!'], 200);
    }
}
