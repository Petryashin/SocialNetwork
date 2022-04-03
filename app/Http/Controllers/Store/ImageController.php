<?php

namespace App\Http\Controllers\Store;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage(int $id)
    {
        //Storage::disk('local')->get("images/vedCciJrsc1TkqySKjJfVhr0JoiN6PSL7xdHNn4n.jpg")
        return response()->file(storage_path('app/' . User::find($id)->info->photo));
    }
    public function setImage(Request $request)
    {
        Log::debug(print_r($request->file(), true));
        $filepath = $request->file('image')->store('images');
        Log::debug(print_r($request->file('image'), true));
        DB::transaction(function () use ($filepath) {
            $userInfo = User::find(1)->info;
            Storage::disk('local')->delete($userInfo->photo);
            $userInfo->update(['photo' => $filepath]);
        });

        return response()->json(['filepath' => $filepath], 200);
    }
}
