<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\LoginController;

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
    return view('list');
})->name('list');

Route::get('/promo', function() {
    return view(('promo'));
});

// Routes for bank
Route::get('/bank', function() {
    return view(('bank'));
});
Route::post('bank', [BankController::class, 'store']);
Route::get('bank', [BankController::class, 'index']);
// Route::delete('bank', [BankController::class, 'destroy']);

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// // Lougout Route
// Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
