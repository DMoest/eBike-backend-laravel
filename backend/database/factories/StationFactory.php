<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'capacity' => $this->faker->numberBetween(10, 20),
            'active' => $this->faker->numberBetween(5, 10),
            'adress' => $this->faker->streetAddress(),
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->randomElement(["Stockholm", "Göteborg", "Malmö", "Karlskrona", "Umeå", "Västerås"]),
        ];
    }
}
