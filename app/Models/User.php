<?php

namespace App\Models;

use App\Models\Chats\EntityChat;
use App\Models\Chats\PrivateChat;
use App\Models\Dialog\Message;
use App\Models\Chats\GlobalChat;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Получение всех сообщений данного пользователя
     */
    public function messages() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }
    /**
     * Получение всех друзей пользователя (через таблицу friends)
     */
    public function friends() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class,"friends","user_one","user_two");
    }

    /**
     * Список всех глобальных чатов, в которых состоит пользователь
     */
    public function globalChats() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(GlobalChat::class);
    }

    /**
     * Список всех личных чатов, в которых состоит пользователь
     */
    public function privateChats() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PrivateChat::class,'global_chat_user',
            'user_id', 'global_chat_id','id','id');
    }
    /*
    * Все чаты пользователя
    */
    public function allChats() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(EntityChat::class, 'global_chat_user',
            'user_id', 'global_chat_id','id','id');
    }

    /**
     * Подробная информация о пользователе
     */
    public function info() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserInfo::class);
    }
}
