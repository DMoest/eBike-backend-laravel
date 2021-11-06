<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(25)->create();
        \App\Models\Bike::factory(25)->create();
        \App\Models\Station::factory(10)->create();


        \App\Models\City::create([
            'id' => 1,
            'city_name' => 'Stockholm',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'id' => 2,
            'city_name' => 'Göteborg',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'id' => 3,
            'city_name' => 'Malmö',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'id' => 4,
            'city_name' => 'Karlskrona',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'id' => 5,
            'city_name' => 'Västerås',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'id' => 6,
            'city_name' => 'Umeå',
            'country' => 'Sverige'
        ]);
    }
}
