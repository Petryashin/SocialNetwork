<?php

namespace App\Http\Controllers\Chats;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function get(Request $request)
    {
        /** @var User $user */
        // TODO: отрефакторить
        $user = Auth::user();
        // return [...$user->globalChats,...$user->privateChats];
        return $user->allChats;
    }
}
