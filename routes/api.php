<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\SlipTransactionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function () {
    Route::get('getUser', 'getUser');
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(BranchController::class)->group(function () {
                //Alias    function name
    Route::get('indexBranch', 'indexBranch');
    Route::get('showBranch/{shopId}', 'showBranchId');
    Route::get('getBranch/{branchId}', 'getBranch');
    Route::post('createBranch', 'createBranch');
    Route::post('updateBranch/{id}', 'updateBranch');
    Route::delete('deleteBranch/{id}', 'deleteBranch');
});

Route::controller(ShopController::class)->group(function () {
              //Alias   function name
    Route::get('index', 'indexShop');
    Route::get('show/{shopId}', 'showShopId');
    Route::post('create', 'createShop');
    Route::post('update/{id}', 'updateShop');
    Route::delete('delete/{id}', 'deleteShop');
});

Route::controller(CustomersController::class)->group(function () {
    Route::get('indexCustomers', 'indexCustomers');
    Route::get('getCustomers/{shopId}', 'getCustomers');
    Route::post('createCustomers', 'createCustomers');
    Route::post('updateCustomer/{id}', 'updateCustomer');
    Route::delete('deleteCustomers/{id}', 'deleteCustomers');
});

Route::controller(SlipTransaction::class)->group(function () {
    Route::get('indexSlipTransactions', 'indexSlipTransactions');
    Route::get('getSlipTransactions/{shopId}', 'getSlipTransactions');
    Route::post('createSlipTransactions', 'createSlipTransactions');
    Route::post('updateSlipTransaction/{id}', 'updateSlipTransaction');
    Route::delete('deleteSlipTransactions/{id}', 'deleteSlipTransactions');
});

Route::controller(CustomersController::class)->group(function () {
    Route::get('indexSlipTransactions', 'indexSlipTransactions');
    Route::get('getSlipTransactions/{shopId}', 'getSlipTransactions');
    Route::post('createSlipTransactions', 'createSlipTransactions');
    Route::post('updateSlipTransaction/{id}', 'updateSlipTransaction');
    Route::delete('deleteSlipTransactions/{id}', 'deleteSlipTransactions');
});
