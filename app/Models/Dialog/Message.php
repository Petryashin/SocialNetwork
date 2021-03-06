<?php

namespace App\Models\Dialog;

use App\Models\Chats\EntityChat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = false;

    /**
     * Получение пользователя, которому принадлежит сообщение
     */
    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Получение чата, которому принадлежит сообщение
     */
    public function chat() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(EntityChat::class, 'chat_id');
    }
}
