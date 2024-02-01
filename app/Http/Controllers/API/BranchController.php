<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class BranchController extends Controller
{
    public function indexBranch(User $user)
    {
        // $data['branch'] = Branch::orderBy('id', 'desc');
        // if (Gate::allows('isSuperAdmin', $user)) {
        $data = Branch::all();

        if (empty($data)) {
            return response()->json([
                'message' => 'No Branch is listed',
                'data' => $data,
            ]);
        }
        return response()->json($data, 200);
        // } else {
        //     return response()->json(['message' => 'You are not authorize!'], 403);
        // }
    }
    public function getBranch(string $branchId, User $user)
    {
        //get() is used for getting all data with the same ID
        //first() is used for getting the first data that is the same ID
        // if (Gate::allows('isAdmin', $user) || Gate::allows('isSuperAdmin', $user) || Gate::allows('isManager', $user)) {
        $branch_id = Branch::where('branchId', $branchId)->first();

        if ($branch_id == null) {
            return response()->json(['message' => 'Nothing is found!']);
        }
        return response()->json($branch_id);
        // } else {
        //     return response()->json(['message' => 'You are not authorize!'], 403);
        // }
    }

    public function showBranchId(string $branchId, User $user)
    {
        //get() is used for getting all data with the same ID
        //first() is used for getting the first data that is the same ID
        // if (Gate::allows('isAdmin', $user) || Gate::allows('isSuperAdmin', $user) || Gate::allows('isManager', $user)) {
        $branch_id = Branch::where('shopId', $branchId)->get();

        if ($branch_id == null) {
            return response()->json(['message' => 'Nothing is found!']);
        }
        return response()->json($branch_id);
        // } else {
        //     return response()->json(['message' => 'You are not authorize!'], 403);
        // }
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * return Illuminate\Http\Response
     */

    public function createBranch(Request $request, User $user)
    {
        // if (Gate::allows('isAdmin', $user) || Gate::allows('isSuperAdmin', $user)) {
        $request->validate(
            [
                // 'fshop_id' => 'required',
                'shopId' => 'required|string|max:10',
                'branchId' => 'required|string|max:10',
                'branchName' => 'required|string|max:50',
                'address1'  => 'required|string|max:50',
                'address2'  => 'required|string|max:50',
                'dateOpened'  => 'required|date',
                'type'  => 'required|string|max:1',
                'notes'  => 'required|string|max:255',
                'remark'  => 'required|string|max:255',
            ],
        );

        $branch = Branch::create([
            // 'shop_id' => $request->shop_id,
            'shopId' => $request->shopId,
            'branchId' => $request->branchId,
            'branchName' => $request->branchName,
            'address1' => $request->address1,
            'address2' => $request->address2,
            //YYYY/MM/DD format
            'dateOpened' => $request->dateOpened,
            'type' => $request->type,
            'notes' => $request->notes,
            'remark' => $request->remark,
        ]);

        return response()->json(
            $branch,
            200
        );
        // } else {
        //     return response()->json(['message' => 'You are not authorize!'], 403);
        // }
    }

    public function updateBranch(Request $request, $id, User $user)
    {
        // if (Gate::allows('isAdmin', $user) || Gate::allows('isSuperAdmin', $user)) {
        $request->validate(
            [
                'branchName' => 'required|string|max:50',
                'address1'  => 'required|string|max:50',
                'address2'  => 'required|string|max:50',
                'dateOpened'  => 'required|date',
                'type'  => 'required|string|max:1',
                'notes'  => 'required|string|max:255',
                'remark'  => 'required|string|max:255',
            ],
        );

        $branch = Branch::where('branchId', '=', $id)->first();
        if ($branch == null) {
            return response()->json(['message' => 'Cannot find shop'], 404);
        } else {
            $branch->update($request->all());
            return response()->json(['message' => 'Update branch successfully!', 'data' => $branch], 200);
        }
        // } else {
        //     return response()->json(['message' => 'You are not authorize!'], 403);
        // }
    }

    public function deleteBranch($id, User $user)
    {
        // if (Gate::allows('isSuperAdmin', $user)) {
        $delete_branch = Branch::find($id);
        if ($delete_branch == null) {
            return response()->json(['message' => 'Something went wrong! Can\'t delete shop branch..']);
        }
        $delete_branch->delete();
        return response()->json(['message' => 'Branch successfully deleted!', 200]);
        // } else {
        //     return response()->json(['message' => 'You are not authorize!'], 403);
        // }
    }
}
