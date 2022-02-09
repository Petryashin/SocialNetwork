<?php

namespace Database\Factories\Dialog;

use App\Models\Dialog\Message;
use App\Models\Chats\GlobalChat;
use App\Models\Chats\PrivateChat;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $chat_types = [GlobalChat::class,PrivateChat::class];
        return [
            "text" =>$this->faker->text,
            "user_id"=>$this->faker->numberBetween(1,20),
            "chat_id"=>$this->faker->numberBetween(1,10),
            "chat_type"=>$chat_types[$this->faker->numberBetween(0,1)],
        ];
    }
    public function modelName(){
        return Message::class;
    }
}
