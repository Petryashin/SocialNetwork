<?php

namespace App\Http\Controllers\Dialog;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserInfoResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get()
    {
        $user = Auth::id();
        if (!$user) return null;
        return $user;
    }
    /**
     * Получение информации о пользователе
     * @var int $id id пользователя
     */
    public function getInfo(int $id)
    {
        /**@var User $user */
        $user = User::find($id);
        if (!$user){
            return response()->json(['success' => false], Response::HTTP_LOCKED);
        }
        if(is_null($user->info)){
            $user->info()->create();
        }

        return response()->json(['success' => true, 'user' => new UserInfoResource($user->info)], Response::HTTP_OK);
    }
    /**
     * Сохранение изменившейся информации о user
     */
    // TODO: сделать валидацию формы
    public function setInfo(int $id, Request $request)
    {
        /**@var User $user */
        $data = $request->all();
        $user = Auth::user();
        $truth = $user->id === $id;

        if (!$truth) {
            return response()->json(['success' => false], Response::HTTP_FORBIDDEN);
        }
        $infos = $user->info;
        $infos->update($data);

        return response()->json(['success' => true, 'user_info' => new UserInfoResource($infos)]);
    }
}
