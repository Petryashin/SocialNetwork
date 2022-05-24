<?php

namespace App\Models\Chats;

use App\Models\Chats\EntityChat as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  Illuminate\Database\Eloquent\Builder;

class PrivateChat extends Model
{
    use HasFactory;


    protected $attributes = [
        'chat_type'=> self::class
    ];

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope('chat_type', function(Builder  $table){
            $table->where('chat_type', self::class);
        });
    }
}
