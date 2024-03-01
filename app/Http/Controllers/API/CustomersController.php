<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class CustomersController extends Controller
{
    public function indexCustomers()
    {
        $data = Customers::orderBy('id', 'desc');

        if (empty($data)) {
            return response()->json(['message' => 'No Customer is listed', 'data' => $data], 204);
        }

        return response()->json($data, 200);
    }

    public function getCustomers(string $customers_name)
    {
        $get_customersName = Customers::where('firstName', $customers_name)->get();

        if (empty($getName)) {
            return response()->json(['message' => 'Cannot find Customer', 'data' => $get_customersName], 204);
        }

        return response()->json($get_customersName, 200);
    }
    public function createCustomers(Request $request)
    {
        $request->validate([
            'custId' => 'required|string|max:10',
            'lastName' => 'required|string|max:30',
            'firstName' => 'required|string|max:30',
            'middleName' => 'required|string|max:30',
            'mobileno' => 'required|string|max:30',
            'address1' => 'required|string|max:50',
            'address2' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'vip' => 'required|string|max:3',
            'trancount' => 'required|integer',
            'totalsales' => 'required|decimal',
            'notes' => 'required|string|max:255',
            'remark' => 'required|string|max:255'
        ]);

        $customers = Customers::create([
            'custId' => $request->custId,
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'mobileno' => $request->mobileno,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'vip' => $request->vip,
            'trancount' => $request->trancount,
            'totalsales' => $request->totalsales,
            'notes' => $request->notes,
            'remark' => $request->remark
        ]);

        return response()->json($customers, 200);
    }

    public function updateCustomer(Request $request, string $customers_name)
    {
        $request->validate([
            'custId' => 'required|string|max:10',
            'lastName' => 'required|string|max:30',
            'firstName' => 'required|string|max:30',
            'middleName' => 'required|string|max:30',
            'mobileno' => 'required|string|max:30',
            'address1' => 'required|string|max:50',
            'address2' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'vip' => 'required|string|max:3',
            'trancount' => 'required|integer',
            'totalsales' => 'required|decimal',
            'notes' => 'required|string|max:255',
            'remark' => 'required|string|max:255'
        ]);

        $customers = Customers::where('firstName', '=', $customers_name)->first();
        if ($customers == null) {
            return response()->json(['message' => 'Cannot find Customer'], 404);
        }

        $customers->update($request->all());
        return response()->json(['message' => 'Update Customer Successfully!', 'data' => $customers], 200);
    }

    public function deleteCustomers($id)
    {
        $delete_customer = Customers::find($id);

        if ($delete_customer == null) {
            return response()->json(['message' => 'Cannot find Customer'], 404);
        }

        $delete_customer->delete();
        return response()->json(['message' => 'Customer Successfully deleted!'], 200);
    }
}
