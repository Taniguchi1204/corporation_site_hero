<?php

use App\Http\Controllers\MailSendController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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
    return Inertia::render('Top');
})->name('top');

Route::get('/#header', function () {
    return Inertia::render('Top');
})->name('top_redirect');

Route::get('/company_profile', function () {
    return Inertia::render('CompanyProfile');
})->name('company_profile');

Route::get('/message', function () {
    return Inertia::render('Message');
})->name('message');

Route::get('/products', function () {
    return Inertia::render('Products');
})->name('products');

Route::get('/factory', function () {
    return Inertia::render('Factory');
})->name('factory');

Route::get('/#contact', function () {
    return Inertia::render('Top');
})->name('contact');

Route::post('/mail', [MailSendController::class, 'send'])->name('mail');;

require __DIR__.'/auth.php';
