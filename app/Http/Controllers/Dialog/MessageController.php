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
     * Получение сообщений для чата
     */
    public function get(int $chat_id): \Illuminate\Database\Eloquent\Collection
    {
        /**  @var \Illuminate\Database\Eloquent\Collection $messages */
        $messages = Message::with('user:id,name')
            ->has('user')
            ->where("chat_id", $chat_id)
            // TODO: переделать потом
            ->orderBy('created_at', "DESC")
            ->paginate(20, '*', 'page_paginate');
        return $messages->reverse()->values();
    }

    public function put(Request $request, int $chat_id)
    {
        $data = $request->all();
        if (Auth::user()->id !== $data["user_id"]) return abort(300);
        event(new MessageCreated($data));
        MessageCreatedBroadcasting::dispatch($data);
        return $data;
    }
}
