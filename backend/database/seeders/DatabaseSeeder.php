<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\City;
use App\Models\ParkingZone;
use App\Models\Station;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Bike::factory(1000)->create();
        Station::factory(75)->create();


        City::create([
            '_id' => 1,
            'name' => 'Stockholm',
            'country' => 'Sverige'
        ]);

        City::create([
            '_id' => 2,
            'name' => 'Göteborg',
            'country' => 'Sverige'
        ]);

        City::create([
            '_id' => 3,
            'name' => 'Malmö',
            'country' => 'Sverige'
        ]);

        City::create([
            '_id' => 4,
            'name' => 'Karlskrona',
            'country' => 'Sverige'
        ]);

        City::create([
            '_id' => 5,
            'name' => 'Västerås',
            'country' => 'Sverige'
        ]);

        City::create([
            '_id' => 6,
            'name' => 'Umeå',
            'country' => 'Sverige'
        ]);


        ParkingZone::create([
            'city' => 'Umeå',
            'sw_latitude' => 63.825501,
            'sw_longitude' => 20.255077,
            'se_latitude' => 63.825501,
            'se_longitude' => 20.263314,
            'ne_latitude' => 63.828028,
            'ne_longitude' => 20.263314,
            'nw_latitude' => 63.828028,
            'nw_longitude' => 20.255077
        ]);

        ParkingZone::create([
            'city' => 'Umeå',
            'sw_latitude' => 63.826940,
            'sw_longitude' => 20.250028,
            'se_latitude' => 63.826940,
            'se_longitude' => 20.250028,
            'ne_latitude' => 63.828420,
            'ne_longitude' => 20.253622,
            'nw_latitude' => 63.828420,
            'nw_longitude' => 20.253622,
        ]);

        ParkingZone::create([
            'city' => 'Stockholm',
            'sw_latitude' => 59.33903287991665,
            'sw_longitude' => 18.05815684888098,
            'se_latitude' => 59.33903287991665,
            'se_longitude' => 18.05815684888098,
            'ne_latitude' => 59.338304699433785,
            'ne_longitude' => 18.058617794303306,
            'nw_latitude' => 59.338304699433785,
            'nw_longitude' => 18.058617794303306
        ]);

        ParkingZone::create([
            'city' => 'Stockholm',
            'sw_latitude' => 59.335785,
            'sw_longitude' => 18.055426,
            'se_latitude' => 59.335785,
            'se_longitude' => 18.055426,
            'ne_latitude' => 59.33486746757162,
            'ne_longitude' => 18.055421594925008,
            'nw_latitude' => 59.33486746757162,
            'nw_longitude' => 18.055421594925008
        ]);

        ParkingZone::create([
            'city' => 'Göteborg',
            'sw_latitude' => 57.699183,
            'sw_longitude' => 11.973789,
            'se_latitude' => 57.699183,
            'se_longitude' => 11.973789,
            'ne_latitude' => 57.697435,
            'ne_longitude' => 11.973940,
            'nw_latitude' => 57.697435,
            'nw_longitude' => 11.973940
        ]);

        ParkingZone::create([
            'city' => 'Göteborg',
            'sw_latitude' => 57.699756,
            'sw_longitude' => 11.976217,
            'se_latitude' => 57.699756,
            'se_longitude' => 11.976217,
            'ne_latitude' => 57.698467,
            'ne_longitude' => 11.976917,
            'nw_latitude' => 57.698467,
            'nw_longitude' => 11.976917
        ]);


        Travel::create([
            'city' => "Umeå",
            'user_id' => 1,
            'bike_id' => 1,
            'status' => "active",
            'updated_at' => now(),
            'created_at' => now(),
            'price' => 50,
            'start_longitude' => 20.24606820235114,
            'start_latitude' => 63.829359941030646,
            'stop_longitude' => 20.24814734997325,
            'stop_latitude' => 63.81873924052044,
            'payment_status' => "paid"
        ]);

        Travel::create([
            'city' => "Umeå",
            'user_id' => 2,
            'bike_id' => 2,
            'status' => "active",
            'updated_at' => now(),
            'created_at' => now(),
            'price' => 50,
            'start_longitude' => 20.24606820235114,
            'start_latitude' => 63.829359941030646,
            'stop_longitude' => 20.24814734997325,
            'stop_latitude' => 63.81873924052044,
            'payment_status' => "paid"
        ]);

        Travel::create([
            'city' => "Umeå",
            'user_id' => 3,
            'bike_id' => 3,
            'status' => "active",
            'updated_at' => now(),
            'created_at' => now(),
            'price' => 50,
            'start_longitude' => 20.24606820235114,
            'start_latitude' => 63.829359941030646,
            'stop_longitude' => 20.24814734997325,
            'stop_latitude' => 63.81873924052044,
            'payment_status' => "unpaid"
        ]);

        Travel::create([
            'city' => "Umeå",
            'user_id' => 4,
            'bike_id' => 4,
            'status' => "active",
            'updated_at' => now(),
            'created_at' => now(),
            'price' => 50,
            'start_longitude' => 20.24606820235114,
            'start_latitude' => 63.829359941030646,
            'stop_longitude' => 20.24814734997325,
            'stop_latitude' => 63.81873924052044,
            'payment_status' => "unpaid"
        ]);
    }
}
