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
        \App\Models\User::factory(100)->create();
        \App\Models\Bike::factory(250)->create();
        \App\Models\Station::factory(50)->create();


        \App\Models\City::create([
            'name' => 'Stockholm',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'name' => 'Göteborg',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'name' => 'Malmö',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'name' => 'Karlskrona',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'name' => 'Västerås',
            'country' => 'Sverige'
        ]);

        \App\Models\City::create([
            'name' => 'Umeå',
            'country' => 'Sverige'
        ]);
    }
}
