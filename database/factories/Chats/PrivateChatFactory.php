<?php

namespace Database\Factories\Chats;

use App\Models\Chats\PrivateChat;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrivateChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>"chat".$this->faker->name,
        ];
    }
    public function modelName(){
        return PrivateChat::class;
    }
}
