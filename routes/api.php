<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatsController;
use App\Http\Controllers\Tests\TestController;
use App\Http\Controllers\Dialog\UserController;
use App\Http\Controllers\Store\ImageController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//images/vedCciJrsc1TkqySKjJfVhr0JoiN6PSL7xdHNn4n.jpg
Route::post('test', TestController::class);
Route::get('test', [ImageController::class, 'get']);
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
            Route::group([
                'prefix' => "/photo"
            ], function ($routes) {
                Route::post('/{id}', [ImageController::class, "setImage"])->where('id', '[0-9]+');
                Route::get('/{id}', [ImageController::class, "getImage"])->where('id', '[0-9]+');

            });
        });

        Route::group([
            'prefix' => "/chats"
        ], function ($routes) {
            Route::get('/', [ChatsController::class, "get"]);
        });
    }
);
