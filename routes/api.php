<?php

use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserContoller;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserContoller::class, 'fetch']);
    Route::post('user', [UserContoller::class, 'updateProfile']);
    Route::post('user/photo', [UserContoller::class, 'updatePhoto']);
    Route::post('logout', [UserContoller::class, 'logout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
});

Route::post('login', [UserContoller::class, 'login']);
Route::post('register', [UserContoller::class, 'register']);

Route::get('food', [FoodController::class, 'all']);
Route::post('midtrans/callback', [MidtransController::class, 'callback']);
