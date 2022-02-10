<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" =>$this->faker->unique()->numberBetween(1,11),
            "birthday"=>Carbon::parse($this->faker->dateTimeThisCentury->format('Y-m-d')),
            "education"=>$this->faker->company,
            "photo"=>""."jpg",
            "city"=>$this->faker->city,
            "address"=>$this->faker->address,
            "phone"=>$this->faker->e164PhoneNumber,
        ];
    }
}
