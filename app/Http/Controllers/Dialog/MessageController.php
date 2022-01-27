<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Models\Dialog\Message;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Получение сообщений дял чата
     */
    public function get() : \Illuminate\Database\Eloquent\Collection
    {
        /**  @var \Illuminate\Database\Eloquent\Collection $messages */
        $messages = Message::with('user:id,name')
        ->has('user')
        // ->where("created_at", '>', Carbon::now()->subHours(8))
        ->orderBy('created_at',"DESC")
        ->limit(20)
        ->get();
        return $messages->reverse()->values();
        return $messages->sortBy(function($message){
            return $message->created_at;
        });
    }
    public function put(Request $request){
        /** @var Message $message */
        $message = Message::create($request->all());
        return $message;
    }
}
