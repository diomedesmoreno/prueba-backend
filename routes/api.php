<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurrenciesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductPricesController;

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

Route::middleware('api')->group(function () {
    Route::post('currencies', [CurrenciesController::class, 'store']);
});


// Route::apiResource('currencies', CurrenciesController::class);
// Route::apiResource('products', ProductsController::class);
// Route::apiResource('products', ProductPricesController::class);

// currencies
Route::get('/currencies', [CurrenciesController::class, 'index']);
Route::get('/currencies/{id}', [CurrenciesController::class, 'show']);
Route::post('/currencies', [CurrenciesController::class, 'store']);
Route::put('/currencies', [CurrenciesController::class, 'update']);
Route::delete('/currencies/{id}', [CurrenciesController::class, 'destroy']);

// products
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/product/{id}', [ProductsController::class, 'show']);
Route::post('/product', [ProductsController::class, 'store']);
Route::put('/product', [ProductsController::class, 'update']);
Route::delete('/product/{id}', [ProductsController::class, 'destroy']);

// product prices
Route::get('products/{id}/prices', [ProductPricesController::class, 'details']);
Route::post('products/{id}/prices', [ProductPricesController::class, 'store']);



