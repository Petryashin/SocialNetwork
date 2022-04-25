<?php

namespace App\Http\Controllers\Dialog;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserInfoResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get()
    {
        $user = Auth::id();
        if (!$user) return null;
        return $user;
    }
    public function getInfo(int $id)
    {
        /**@var User $user */
        $user = User::find($id);
        if (!$user) return null;
        if(!$user->info) $user->info()->create();
        return response()->json(['success' => true, 'user' => new UserInfoResource($user->info)]);
    }
    public function setInfo(int $id, Request $request)
    {
        /**@var User $user */
        $data = $request->all();
        $user = Auth::user();
        $truth = $user->id === $id;
        if (!$truth) return response()->json(['success' => false], 403);
        $infos = $user->info;
        $infos->update($data);
        return response()->json(['success' => true, 'user_info' => $infos]);
    }
}
