<?php

use App\Http\Controllers\CurrencyController;
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

//Route::apiResource('currencies', CurrencyController::class)
//    ->middleware('auth:sanctum')
//    ->only(['index', 'show'])
//    ->whereNumber(['id']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/currencies', [CurrencyController::class, 'index']);
    Route::get('/currency', [CurrencyController::class, 'show']);
});
