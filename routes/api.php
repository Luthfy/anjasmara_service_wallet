<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\PromotionController;
use App\Http\Controllers\API\WalletController;
use Database\Factories\WalletFactory;

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
    return view('layouts.main', [
        'title' => 'Main'
    ]);
});

Route::get('xendit/va/list',  [WalletController::class, 'getListVa']);
Route::post('xendit/va/create',  [WalletController::class, 'createVa']);

// Wallet view
Route::get('/wallet', [WalletController::class, 'index']);

// Get a wallet by id
Route::get('/wallet/{wallet:id}', [WalletController::class, 'walletGet']);

// Create a wallet
Route::post('/wallet/create', [WalletController::class, 'walletCreate']);


// Bank
Route::get('/banks', [BankController::class, 'index']);
Route::get('/banks/api', [BankController::class, 'bankGet']);
Route::post('/banks/create', [BankController::class, 'bankCreate']);
Route::put('/banks/{bank:id}', [BankController::class, 'bankIsDeleted']);

// Promo
Route::get('/promos', [PromotionController::class, 'index']);
Route::get('/promos/api', [PromotionController::class, 'promoGet']);
Route::post('/promos/create', [PromotionController::class, 'promoCreate']);
Route::put('/promos/{promo:id}', [PromotionController::class, 'promoIsDeleted']);