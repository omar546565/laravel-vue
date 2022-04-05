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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
Route::post('register',[\App\Http\Controllers\AuthController::class,'register']);
Route::get('users',[\App\Http\Controllers\AuthController::class,'users']);
Route::post('updateuser',[\App\Http\Controllers\AuthController::class,'updateuser']);
Route::post('pusher',[\App\Http\Controllers\AuthController::class,'pusher']);
Route::get('userremove',[\App\Http\Controllers\AuthController::class,'userremove']);
