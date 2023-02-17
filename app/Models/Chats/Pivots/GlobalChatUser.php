<?php

namespace App\Models\Chats\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalChatUser extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = "global_chat_user";
}
