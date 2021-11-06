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
            'city_id' => $this->faker->numberBetween(1,6),
            'status' => $this->faker->randomElement(["in_service", "in_repair", "broken", "lost", "out_of_service"]),
            'active' => $this->faker->boolean(),
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude()
        ];
    }
}
