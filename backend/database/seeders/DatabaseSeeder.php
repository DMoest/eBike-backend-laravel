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

        \App\Models\User::factory(500)->create();
        \App\Models\Bike::factory(500)->create();
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
//            'id' => 6,
            'name' => 'Umeå',
            'country' => 'Sverige'
        ]);

        \App\Models\ParkingZone::create([
            'city' => 'Umeå',
            'sw_latitude' => 63.824319,
            'sw_longitude' => 20.260667,
            'se_latitude' => 63.825154,
            'se_longitude' => 20.261633,
            'ne_latitude' => 63.824920,
            'ne_longitude' => 20.263607,
            'nw_latitude' => 63.823985,
            'nw_longitude' => 20.262695
        ]);

        \App\Models\ParkingZone::create([
            'city' => 'Umeå',
            'sw_latitude' => 63.826940,
            'sw_longitude' => 20.250028,
            'se_latitude' => 63.82669390182269,
            'se_longitude' => 20.25184653628282,
            'ne_latitude' => 63.828420,
            'ne_longitude' => 20.253622,
            'nw_latitude' => 63.828800,
            'nw_longitude' => 20.251750
        ]);

        \App\Models\ParkingZone::create([
            'city' => 'Stockholm',
            'sw_latitude' => 59.33903287991665,
            'sw_longitude' => 18.05815684888098,
            'ne_latitude' => 59.338304699433785,
            'ne_longitude' => 18.058617794303306
        ]);

        \App\Models\ParkingZone::create([
            'city' => 'Stockholm',
            'sw_latitude' => 59.335785,
            'sw_longitude' => 18.055426,
            'ne_latitude' => 59.33486746757162,
            'ne_longitude' => 18.055421594925008
        ]);

        \App\Models\ParkingZone::create([
            'city' => 'Göteborg',
            'sw_latitude' => 57.699183,
            'sw_longitude' => 11.973789,
            'ne_latitude' => 57.697435,
            'ne_longitude' => 11.973940
        ]);

        \App\Models\ParkingZone::create([
            'city' => 'Göteborg',
            'sw_latitude' => 57.699756,
            'sw_longitude' => 11.976217,
            'ne_latitude' => 57.698467,
            'ne_longitude' => 11.976917
        ]);
    }
}
