<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\City;


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
        return json_encode([
            'id' => $city['id'],
            'name' => $city['name'],
            'country' => $city['country']
        ]);
    }
}
