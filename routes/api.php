<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;

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



//Route::middleware('auth:api')->group(function () {
    //Route::apiResource('events', EventController::class);
//});

Route::resource('events', EventController::class);
//Route::get('/event', [EventController::class, 'index']);

Route::apiResource('events', EventController::class);

