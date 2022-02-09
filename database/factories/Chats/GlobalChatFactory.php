<?php

namespace Database\Factories\Chats;

use App\Models\Chats\GlobalChat;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlobalChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>"chat".$this->faker->name
        ];
    }
    public function modelName(){
        return GlobalChat::class;
    }
}
