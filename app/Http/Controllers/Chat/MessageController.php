<?php

namespace App\Http\Controllers\Chat;

use App\Http\Requests\Chat\CreateMessageRequest;
use App\Http\Resources\MessagesResource;
use App\Models\Dialog\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Events\Dialog\MessageCreated;
use App\Events\Dialog\MessageCreatedBroadcasting;

class MessageController extends Controller
{
    /**
     * Получение сообщений для чата
     * @param int $chat_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $chat_id): \Illuminate\Http\JsonResponse
    {
        $messages = Message::with('user:id,name')
            ->has('user')
            ->where("chat_id", $chat_id)
            ->orderBy('created_at', "DESC")
            ->paginate(20, ['*'], 'page_paginate');

        return response()
            ->json([
                'success' => true,
                'data' => MessagesResource::collection($messages->reverse()),
                'last_page' => $messages->lastPage(),
                'current_page' => $messages->currentPage(),
                'next_page_url' => $messages->nextPageUrl()
            ]);
    }

    public function put(CreateMessageRequest $request, int $chat_id)
    {
        $data = $request->validated();

        if (Auth::user()->id !== $data["user_id"]) {
            return abort(300);
        }

        event(new MessageCreated($data));
        MessageCreatedBroadcasting::dispatch($data);

        return response()
            ->json([
                'success' => true
            ]);
    }
}
