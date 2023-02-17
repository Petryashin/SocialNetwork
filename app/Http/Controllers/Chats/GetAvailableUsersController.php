<?php

namespace App\Http\Controllers\Chats;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Chats\Pivots\GlobalChatUser;
use App\Models\Chats\PrivateChat;
use App\Models\User;
use Illuminate\Http\Request;

class GetAvailableUsersController extends Controller
{
    public function getAvailable(Request $request, User $user)
    {
        $validated = $request->validate(
            ["name" => "required|string||max:255"]
        );

        $userIdsWithChatsExist = [$user->id];

        $privateChats = PrivateChat::query()
            ->with('users')
            ->whereHas('users', static function ($query) {
                $query->where("user_id", 1);
            });

        $privateChats->get()->each(static function (PrivateChat $chat) use (&$userIdsWithChatsExist, $user) {
            $chat->users->each(static function (GlobalChatUser $ghUser) use (&$userIdsWithChatsExist, $user) {
                if ($ghUser->user_id !== $user->id) {
                    $userIdsWithChatsExist[] = $ghUser->user_id;
                }
            });
        });

        $availableUsers = User::query()
            ->where("name", "like","%{$validated["name"]}%")
            ->whereNotIn("id", $userIdsWithChatsExist)
            ->get();

        return response()->json([
            "success" => true,
            "users" => UserResource::collection($availableUsers)
        ]);
    }
}
