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

        \App\Models\User::factory(5)->create();
        \App\Models\Bike::factory(25)->create();
        \App\Models\Station::factory(15)->create();


        \App\Models\City::create([
//            'id' => 1,
            'name' => 'Stockholm',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
//            'id' => 2,
            'name' => 'Göteborg',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
//            'id' => 3,
            'name' => 'Malmö',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
//            'id' => 4,
            'name' => 'Karlskrona',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
//            'id' => 5,
            'name' => 'Västerås',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
//            'id' => 6,
            'name' => 'Umeå',
            'country' => 'Sverige'
        ]);
    }
}
