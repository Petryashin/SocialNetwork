<?php

namespace App\Models\Chats;

use App\Models\Chats\Pivots\GlobalChatUser;
use App\Models\Dialog\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityChat extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table='global_chats';

    /**
     * Получение сообщений из текущего чата
     */
    public function messages() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class,"chat_id");
    }

    /**
     * Получение users - участников чата
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GlobalChatUser::class,"global_chat_id");
    }
}
