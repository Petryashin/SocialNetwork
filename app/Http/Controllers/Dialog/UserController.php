<?php

namespace App\Http\Controllers\Dialog;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get(){
        $user = Auth::id();
        if (!$user) return null;
        return $user;
    }
    public function getById(int $user_id){
        return User::find($user_id);
    }
}
