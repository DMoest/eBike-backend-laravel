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
            'city' => "Stockholm",
//            'city' => $this->faker->randomElement(["Stockholm", "Göteborg", "Malmö", "Karlskrona", "Umeå", "Västerås"]),
            'status' => "in_service",
//            'status' => $this->faker->randomElement(["in_service", "in_repair", "broken", "lost", "out_of_service"]),
            'active' => true,
//            'active' => $this->faker->boolean(),
            'longitude' => 0.1111,
//            'longitude' => $this->faker->longitude(),
            'latitude' => 0.111,
//            'latitude' => $this->faker->latitude(),
            'speed' => 0,
            'battery' => $this->faker->numberBetween(1, 100)
        ];
    }
}
