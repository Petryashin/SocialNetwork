<?php

namespace App\Models\Chats\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalChatUser extends Model
{
    use HasFactory;
    protected $table = "global_chat_user";
}
