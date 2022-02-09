<?php

namespace Database\Seeders;

use App\Models\Friend;
use App\Models\Dialog\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // Message::factory(2000)->create();
        Friend::factory(10)->create();
    }
}
