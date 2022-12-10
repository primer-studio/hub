<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    /** ------- Latest ------- **/
    Route::get('latest', [\App\Http\Controllers\Api\NewsController::class, 'Index']);

    /** ------- Publisher ------- **/
    Route::prefix('publisher')->group(function () {
        Route::get('/{publisher_id}/{count}', [\App\Http\Controllers\Api\NewsController::class, 'Publisher']);
    });
});
