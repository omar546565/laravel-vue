<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NamelastController;

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

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::get('users',[AuthController::class,'users']);
Route::post('updateuser',[AuthController::class,'updateuser']);
Route::post('updateuserimage',[AuthController::class,'updateuserimage']);
Route::post('updatepass',[AuthController::class,'updatepass']);
Route::post('pusher',[AuthController::class,'pusher']);
Route::get('userremove',[AuthController::class,'userremove']);


Route::resource('namelast', NamelastController::class);
