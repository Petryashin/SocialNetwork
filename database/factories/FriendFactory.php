<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FriendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_one"=>$this->faker->numberBetween(1,10),
            "user_two"=>$this->faker->unique()->numberBetween(1,10)
        ];
    }
}
