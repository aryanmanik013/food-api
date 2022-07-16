<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;

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

Route::get('getfood',[FoodController::class,'getFood']);
Route::post('addfood', [FoodController::class, 'AddFood']);
Route::post('adduser', [UserController::class, 'addUser']);
Route::get('login', [UserController::class, 'login']);
Route::get('git/{location}', [FoodController::class, 'search']);




