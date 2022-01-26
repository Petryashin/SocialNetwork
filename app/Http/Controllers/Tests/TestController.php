<?php

namespace App\Http\Controllers\Tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __invoke(Request $request){
        dump(Auth::user());
        dump(Auth::user()->name);
        dump($request->session());
    }
}
