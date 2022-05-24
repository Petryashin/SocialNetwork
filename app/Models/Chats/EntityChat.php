<?php

namespace App\Models\Chats;

use App\Models\Dialog\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityChat extends Model
{
    use HasFactory;

    protected $table='global_chats';

    /**
     * Получение сообщений из текущего чата
     */
    public function messages() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class,"chat_id");
    }
}
