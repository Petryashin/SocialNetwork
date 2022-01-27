<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Models\Dialog\Message;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function get(){
        return Message::all();
    }
}
