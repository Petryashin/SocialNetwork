<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Models\Dialog\Message;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\Dialog\MessageCreated;
use App\Events\Dialog\MessageCreatedBroadcasting;

class MessageController extends Controller
{
    /**
     * Получение сообщений дял чата
     */
    public function get(int $chat_id): \Illuminate\Database\Eloquent\Collection
    {
        /**  @var \Illuminate\Database\Eloquent\Collection $messages */
        $messages = Message::with('user:id,name')
            ->has('user')
            // ->where("created_at", '>', Carbon::now()->subHours(8))
            ->where("chat_id", $chat_id)
            // TODO: переделать потом
            ->where("chat_type","App\Models\Chats\GlobalChat")
            ->orderBy('created_at', "DESC")
            ->limit(20)
            ->get();
        return $messages->reverse()->values();
        return $messages->sortBy(function ($message) {
            return $message->created_at;
        });
    }
    public function put(Request $request, int $chat_id)
    {
        $data = $request->all();
        if (Auth::user()->id !== $data["user_id"]) return abort(300);
        $data["chat_type"] = "App\Models\Chats\GlobalChat"; 
        event(new MessageCreated($data));
        MessageCreatedBroadcasting::dispatch($data);
        return $data;
    }
}
