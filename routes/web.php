<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/company_profile', function () {
    return view('welcome');
});

Route::get('/message', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('welcome');
});

Route::get('/factory', function () {
    return view('welcome');
});
