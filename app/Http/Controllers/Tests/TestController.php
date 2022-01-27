<?php

namespace App\Http\Controllers\Tests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Dialog\Message;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
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
                dump($model->messages()->where('created_at',"<",Carbon::now())->get());
                $model = Message::find(2);
                dump($model->user);
        }
    }
}
