<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\City;


/**
 * Bike Controller class.
 * Requests data related to Bike class.
 */
class CityController extends Controller
{
    /**
     * @method getCities()
     * @description Getter method to request all cities from database.
     * @return string
     */
    final public function getCities(): string
    {
        return json_encode(City::all());
    }


    /**
     * @method getCity()
     * @description Getter method to return specific city from database.
     * @param City $city
     * @return string
     */
    final public function getCity(City $city): string
    {
        return json_encode($city);
    }
}
