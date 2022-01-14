<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            '_id' => $this->faker->unique()->randomNumber(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'adress' => $this->faker->streetAddress(),
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->randomElement(["Stockholm", "Göteborg", "Umeå"]),
            'phone' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'testauth',
            'payment_method' => 'monthly',
            'payment_status' => 'paid',
            'remember_token' => Str::random(10),
            'userClass' => 'User'
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
