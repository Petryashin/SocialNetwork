<?php

namespace App\Models\Chats;

use App\Models\Dialog\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityChat extends Model
{
    use HasFactory;

    /**
     * Получение сообщений из текущего чата
     */
    public function messages() : \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Message::class,"chat");
    }
}
