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

Route::middleware(['cors'])->group(function () {
    Route::get('/webhooks/inbound-sms', [App\Http\Controllers\SendController::class, 'get']);
    Route::post('/webhooks/inbound-sms', [App\Http\Controllers\SendController::class, 'post']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
