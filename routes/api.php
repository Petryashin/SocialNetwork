<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tests\TestController;
use App\Http\Controllers\Dialog\UserController;
use App\Http\Controllers\Dialog\MessageController;

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
Route::get('test',TestController::class);
Route::group([
    'middleware' => 'auth',
    'prefix' => "/dialog/messages"
], function ($routes) {
    Route::get('/', [MessageController::class, "get"]);
    Route::put('/', [MessageController::class, "put"]);
});
Route::get('/dialog/user', [UserController::class , "get"])->middleware("auth");
