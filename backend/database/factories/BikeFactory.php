<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     *
     * @todo Fixt the relation mapping on seeding the database. Else testing will not work as planed!
     */
    public function definition()
    {
        return [
            'city' => $this->faker->randomElement(["Stockholm", "Göteborg", "Malmö", "Karlskrona", "Umeå", "Västerås"]),
            'status' => $this->faker->randomElement(["in_service", "in_repair", "broken", "lost", "out_of_service"]),
            'active' => $this->faker->boolean(),
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
            'speed' => 0,
            'battery' => $this->faker->numberBetween(1, 100)
        ];
    }
}
