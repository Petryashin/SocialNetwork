<?php

namespace Database\Factories\Chats\Pivots;

use App\Models\Chats\Pivots\GlobalChatUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlobalChatUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "global_chat_id"=>$this->faker->unique()->numberBetween(1,10),
            "user_id"=>$this->faker->numberBetween(1,4)
        ];
    }
    public function modelName(){
        return GlobalChatUser::class;
    }
}
