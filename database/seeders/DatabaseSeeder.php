<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Friend;
use App\Models\UserInfo;
use App\Models\Dialog\Message;
use Illuminate\Database\Seeder;
use App\Models\Chats\GlobalChat;
use App\Models\Chats\PrivateChat;
use App\Models\Chats\Helpers\GlobalChatUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $num = 10;
        // User::factory($num)->create();
        // Message::factory(2000)->create();
        // Friend::factory($num)->create();
        // GlobalChat::factory($num)->create();
        // PrivateChat::factory($num)->create();
        // GlobalChatUser::factory($num)->create();
        // UserInfo::factory($num)->create();
    }
}
