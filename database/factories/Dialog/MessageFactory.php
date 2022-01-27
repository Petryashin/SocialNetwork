<?php

namespace Database\Factories\Dialog;

use App\Models\Dialog\Message;
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
        return [
            "text" =>$this->faker->text,
            "user_id"=>$this->faker->numberBetween(1,20)
        ];
    }
    public function modelName(){
        return Message::class;
    }
}
