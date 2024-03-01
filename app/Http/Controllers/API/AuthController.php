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

        if (!$token) {
            return response()->json([
                'message' => 'Please enter valid credentials!',
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
            'authorization' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ], 200);
    }
}
