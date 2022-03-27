<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatsController;
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

<<<<<<< HEAD
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('test', TestController::class);
Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        Route::group([
            'prefix' => "/dialog/messages"
        ], function ($routes) {
            Route::get('/{chat_id}', [MessageController::class, "get"])->where('chat_id', '[0-9]+');
            Route::put('/{chat_id}', [MessageController::class, "put"])->where('chat_id', '[0-9]+');
        });
        Route::group([
            'prefix' => "/user"
        ], function ($routes) {
            Route::get('/', [UserController::class, "get"]);
            Route::get('/info/{id}', [UserController::class, "getInfo"]);
            Route::put('/info/{id}', [UserController::class, "setInfo"]);
        });
        
        Route::group([
            'prefix' => "/chats"
        ], function ($routes) {
            Route::get('/', [ChatsController::class, "get"]);
        });
    }
);
=======
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test',TestController::class);
Route::group([
    'middleware' => 'auth',
    'prefix' => "/dialog/messages"
], function ($routes) {
    Route::get('/{chat_id}', [MessageController::class, "get"])->where('chat_id', '[0-9]+');
    Route::put('/{chat_id}', [MessageController::class, "put"])->where('chat_id', '[0-9]+');
});
Route::group([
    'middleware' => 'auth',
    'prefix' => "/dialog/user"
], function () {
    Route::get('/{user_id}', [UserController::class, "getById"])->where('user_id', '[0-9]+');
    Route::get('/', [UserController::class , "get"]);
    
});



Route::group([
    'middleware' => 'auth',
    'prefix' => "/chats"
], function ($routes) {
    Route::get('/', [ChatsController::class, "get"]);
});
>>>>>>> 274d3c29c657281e544b5f8801e1c0aae12c5799
