<?php

use Illuminate\Http\Request;
use Database\Factories\WalletFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\WalletController;
use App\Http\Controllers\API\PromotionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return view('layouts.main');
});

Route::get('/bank', [BankController::class, 'index']);
Route::get('/wallet', [WalletController::class, 'index']);
Route::get('/wallet/{wallet:id}', [WalletController::class, 'walletGet']);
Route::get('/promotion', [PromotionController::class, 'index']);

Route::post('/wallet/create', [WalletController::class, 'walletCreate']);

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
