<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory;
    
    protected $hidden = ['user_id','created_at','updated_at'];
    protected $primaryKey = 'user_id';
    protected $guarded  = false;
    /**
     * Получить главную сущность
     */
    public function main() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class,"id","user_id");
    }
}
