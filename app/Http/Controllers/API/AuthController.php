<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'shopId' => 'required|string|max:10',
                'empId' => 'required|string|max:10|min:4',
                'password' => 'required|string',
            ],
        );

        $credentials = [
            'shopId' => $request->shopId,
            'empId' => $request->empId,
            'password' => $request->password,
        ];

        $token = Auth::attempt($credentials);
        $user = Auth::user();
        $passAndEmp = User::where('empId', '=', $request->empId)->first();
        $passAndShopID = User::where('shopId', '=', $request->shopId)->first();

        if (
            User::where('empId', '!=', $request->empId)->first() &&
            User::where('shopId', '!=', $request->shopId)->first() && !$token
        ) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 401);
        } else if (
            User::where('empId', '!=', $request->empId)->first() &&
            User::where('shopId', '!=', $request->shopId)->first()
        ) {
            return response()->json([
                'message' => 'Shop ID and Employee ID is incorrect!',
            ], 401);
        } else if (
            User::where('empId', '!=', $request->empId)->first() &&
            !Hash::check($request->password, $passAndShopID->password)
        ) {
            return response()->json([
                'message' => 'Incorrect Employee ID and Password!',
            ], 401);
        } else if (
            User::where('shopId', '!=', $request->shopId)->first() &&
            !Hash::check($request->password, $passAndEmp->password)
        ) {
            return response()->json([
                'message' => 'Incorrect Shop ID and Password!',
            ], 401);
        } else if (User::where('shopId', '!=', $request->shopId)->first()) {
            return response()->json([
                'message' => 'Invalid Shop ID!',
            ], 401);
        } else if (User::where('empId', '!=', $request->empId)->first()) {
            return response()->json([
                'message' => 'Invalid Employee ID!',
            ], 401);
        } else if (
            !Hash::check($request->password, $passAndEmp->password) ||
            !Hash::check($request->password, $passAndShopID->password)
        ) {
            return response()->json(['message' => 'Wrong password'], 401);
        }

        if (!$token) {
            return response()->json([
                'message' => 'Invalid credentials!',
            ], 401);
        }


        if ($user->status == 'inactive') {
            return response()->json([
                'message' => 'You cannot login! You are inactive..',
            ], 401);
        }
        if ($user === null) {
            return response()->json([
                'message' => 'User doest not exist',
            ], 401);
        }
        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request, User $user)
    {
        // if (
        //     Gate::allows('isSuperAdmin', $user) ||
        //     Gate::allows('isAdmin', $user) ||
        //     Gate::allows('isManager', $user)
        // ) {
        $request->validate(
            [
                'shopId' => 'required|string|max:10',
                'empId' => 'required|string|max:10',
                'lastName' => 'required|string|max:30',
                'firstName' => 'required|string|max:30',
                'middleName' => 'required|string|max:30',
                'password' => 'required|string|min:6',
                'status' => 'required|max:10',
                // 'role' => 'required',
                'dateHired' => 'required|date',
                'salary' => 'required',
                'notes' => 'required|string|max:255',
                'remark' => 'required|string|max:255',
            ],
            // [
            //     'branchId.required' => 'Branch ID is required.',

            //     'branchId.max' => 'Branch ID must not exceed 10 characters.',
            //     'empId.required' => 'Employee ID is required.',

            //     'empId.max' => 'Employee ID must not exceed 10 characters.',
            //     'lastName.required' => 'Last Name is required.',
            //     'lastName.string' => 'Last Name must be a string.',
            //     'lastName.max' => 'Last Name must not exceed 30 characters.',
            //     'firstName.required' => 'First Name is required.',
            //     'firstName.string' => 'First Name must be a string.',
            //     'firstName.max' => 'First Name must not exceed 30 characters.',
            //     'middleName.required' => 'Middle Name is required.',
            //     'middleName.string' => 'Middle Name must be a string.',
            //     'middleName.max' => 'Middle Name must not exceed 30 characters.',
            //     'password.required' => 'Password is required.',

            //     'password.min' => 'Password must be at least 6 characters.',
            //     'status.required' => 'Status is required.',

            //     'dateHired.required' => 'Date Hired is required.',
            //     'dateHired.date' => 'Date Hired must be a valid date.',
            //     'salary.required' => 'Salary is required.',
            //     'notes.required' => 'Notes are required.',
            //     'notes.string' => 'Notes must be a string.',
            //     'notes.max' => 'Notes must not exceed 255 characters.',
            //     'remark.required' => 'Remark is required.',
            //     'remark.string' => 'Remark must be a string.',
            //     'remark.max' => 'Remark must not exceed 255 characters.',
            // ],
        );

        $user = User::create([
            'shopId' => $request->shopId,
            'empId' => $request->empId,
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            // 'role' => $request->role,
            'restriction' => $request->restriction,
            'dateHired' => $request->dateHired,
            'salary' => $request->salary,
            'notes' => $request->notes,
            'remark' => $request->remark,
        ]);

        return response()->json($user, 200);
        // } else {
        //     return response()->json(['message' => 'Access Denied! You are not authorized.'], 403);
        // }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }

    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ], 200);
    }
}
