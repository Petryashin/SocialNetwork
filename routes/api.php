<?php

use App\Http\Controllers\Chats\CreateNewChatController;
use App\Http\Controllers\Chats\GetAvailableUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chats\ChatsController;
use App\Http\Controllers\Tests\TestController;
use App\Http\Controllers\Chat\UserController;
use App\Http\Controllers\Store\ImageController;
use App\Http\Controllers\Chat\MessageController;

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
Route::get('test', TestController::class);

Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        Route::group([
            'prefix' => "/dialog"
        ], function () {
            Route::get('/user/{user_id}', [UserController::class, "getById"])->where('user_id', '[0-9]+');
            Route::group([
                'prefix' => "/messages"
            ], function ($routes) {
                Route::get('/{chat_id}', [MessageController::class, "get"])->where('chat_id', '[0-9]+');
                Route::put('/{chat_id}', [MessageController::class, "put"])->where('chat_id', '[0-9]+');
            });

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

            Route::group([
                'prefix' => "/privates"
            ], function ($routes) {
                Route::post('/create/{user}', [CreateNewChatController::class, "create"]);
            });

            Route::group([
                'prefix' => "/users"
            ], function ($routes) {
                Route::get('getAvailable/{user}', [GetAvailableUsersController::class, "getAvailable"]);
            });
        });
    }
);
