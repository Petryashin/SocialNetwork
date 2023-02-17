<?php

namespace App\Http\Controllers\Chats;

use App\Http\Controllers\Controller;
use App\Models\Chats\PrivateChat;
use App\Models\User;
use Illuminate\Http\Request;

class CreateNewChatController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function create(Request $request, User $user)
    {
        $validated = $request->validate(
            ["user_id" => "required|integer"]
        );

        $secondUserId = $validated["user_id"];

        $checkExistingSuchChat = PrivateChat::query()
            ->whereHas("users", static function ($query) use ($user) {
                $query
                    ->where("user_id", $user->id);
            })
            ->whereHas("users", static function ($query) use ($secondUserId) {
                $query
                    ->where("user_id", $secondUserId);
            })->exists();

        if ($checkExistingSuchChat) {
            return response()->json([
                    "success" => false,
                    "message" => "Chat already exists"]
            );
        }

        $secondUser = User::find($secondUserId);

        $privateChat = PrivateChat::create([
            "owner_id" => $user->id,
            "name" => $user->name . "|" . $secondUser->name
        ]);

        $privateChat->users()->create([
            "user_id"=> $user->id
        ]);

        $privateChat->users()->create([
            "user_id"=> $secondUser->id
        ]);

        return response()->json([
            "success" => true,
            "newChat" => $privateChat
        ]);
    }
}
