<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(["in_service", "in_repair", "broken", "lost", "out_of_service"]),
            'active' => $this->faker->boolean(),
            'city' => $this->faker->randomElement(["Stockholm", "Göteborg", "Malmö", "Karlskrona", "Västerås", "Umeå"]),
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude()
        ];
    }
}
