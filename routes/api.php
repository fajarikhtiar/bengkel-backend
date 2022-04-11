<?php

use App\Http\Controllers\API\AccesorieController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\SparePartController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('spareparts', [SparePartController::class, 'all']);
Route::get('accesories', [AccesorieController::class, 'all']);
Route::get('services', [ServiceController::class, 'all']);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('customers', [CustomerController::class, 'all']);
Route::get('transactions', [TransactionController::class, 'all']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::put('customer/{id}', [CustomerController::class, 'update']);
    Route::delete('customer/{id}', [CustomerController::class, 'destroy']);
    Route::delete('transactions/{id}', [TransactionController::class, 'destroy']);
    Route::post('customer', [CustomerController::class, 'add']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
    Route::put('checkout/{id}', [TransactionController::class, 'update']);
});
