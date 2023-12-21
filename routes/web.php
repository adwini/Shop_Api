<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('auth.superadmin');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/regbranch', function () {
    return view('regbranch');
});

Route::get('/branch', function () {
    return view('branch');
});

Route::get('/regemp', function () {
    return view('regemp');
});

Route::get('/admindash', function () {
    return view('admindash');
});

Route::get('/regshop', function () {
    return view('regshop');
});


