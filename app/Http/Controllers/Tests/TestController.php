<?php

namespace App\Http\Controllers\Tests;

use Predis\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dialog\Message;
use Illuminate\Support\Carbon;
use App\Models\Chats\GlobalChat;
use App\Models\Chats\PrivateChat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Events\Dialog\MessageCreatedBroadcasting;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {

        // MessageCreatedBroadcasting::dispatch(["text"=>"TestMessage","user_id"=>1]);
        dd();
        MessageCreatedBroadcasting::dispatch(["text" => 'Test!!!!!!!!', "user_id" => 1]);
        // dd();
        // dd(phpinfo());
        dd("sas");
        $val = 1;
        switch ($val) {
            case 1:
                dump(Auth::user());
                dump(Auth::user()->name);
                dump($request->user());
                break;
            case 2:
                $model = User::first();
                // dump($model);
                dump($model->messages()->where('created_at', "<", Carbon::now())->get());
                $model = Message::find(2);
                dump($model->user);
            case 3:
                // dump(PrivateChat::find(1)->messages()->limit(10)->first()->chat()->toSql());
                // dump(PrivateChat::find(1)->messages()->limit(10)->first()->chat);
                // dump(User::find(1)->info->main);
        }
    }
}
