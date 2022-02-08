<?php

namespace App\Http\Controllers\Tests;

use Predis\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dialog\Message;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Events\Dialog\MessageCreatedBroadcasting;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
        dd(Auth::user()->id);
        dump($request->session());
        // MessageCreatedBroadcasting::dispatch(["text"=>"TestMessage","user_id"=>1]);
        // $redis = new Client([
        //     'scheme' => 'tcp',
        //     'host'   => '127.0.0.1',
        //     'port'   => 6379,
        // ],[
        //     'parameters' => [
        //         'password' => 1234
        //         ]
        // ]);
        // $responses = $redis->pipeline()->set('test', json_encode(['bar'=>3232,4343=>323232]))->execute();
        // dump($redis->pipeline()->get('foo')->execute());
        // $redis = new Redis([
        //     'host' => '127.0.0.1',
        //     'port' => 6379,
        //     'connectTimeout' => 2.5,
        //     'auth' => ['phpredis', '1234'],
        //     'ssl' => ['verify_peer' => false],
        // ]);
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
        }
    }
}
