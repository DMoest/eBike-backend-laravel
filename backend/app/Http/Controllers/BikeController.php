<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\City;


/**
 * Bike Controller class.
 * Requests data related to Bike class.
 */
class BikeController extends Controller
{
    /**
     * @method getBikes()
     * @description Getter method to request all bikes from database.
     * @return string
     */
    final public function getBikes(): string
    {
        $data = [
            'bikes' => Bike::with('city')->get()
        ];

        return json_encode($data);
    }


    /**
     * @method getBike()
     * @description Getter method to return specific bike from database.
     * @param Bike $bike
     * @return string
     */
    final public function getBike(Bike $bike): string
    {
        return json_encode($bike);
    }


    final public function getBikesInCity(City $city): string
    {
        $data = [
            'bikes' => $city->bikes
        ];

        return json_encode($data);
    }
}
