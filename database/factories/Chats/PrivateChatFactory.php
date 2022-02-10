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
            "user_one"=>$this->faker->numberBetween(1,4),
            "user_two"=>$this->faker->unique()->numberBetween(1,11)
        ];
    }
    public function modelName(){
        return PrivateChat::class;
    }
}
