<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Travel;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;


/**
 * @TravelController
 * @description Travel Controller class. Requests data related to Travel class.
 *
 * @todo Make better validation process for creating a new travel.
 * @todo Validate input from request like in create travel.
 *
 */
class TravelController extends Controller
{
    /**
     * @method getTravels()
     * @description Getter method to request all travels from database.
     * @return string
     */
    final public function getTravels(): string
    {
        $data = [
            'travels' => Travel::with('city', 'bike')->get()
        ];

        return json_encode($data);
    }


    /**
     * @method getTravel()
     * @description Getter method to return specific travel from database.
     * @param Travel $travel
     * @return string
     */
    final public function getTravel(Travel $travel): string
    {
        return json_encode($travel);
    }


    /**
     * @method getTravelingInCity()
     * @description Getter method to return traveling in specific city.
     * @param City $city
     * @return string
     */
    final public function getTravelingInCity(City $city): string
    {
        $data = [
            'city_travels' => $city->travels
        ];

        return json_encode($data);
    }


    /**
     * @method getTravelingWithBike()
     * @description Getter method to return traveling with specific bike.
     * @param Bike $bike
     * @return string
     */
    final public function getTravelingWithBike(Bike $bike): string
    {
        $data = [
            'bike_travels' => $bike->travels
        ];

        return json_encode($data);
    }


    /**
     * @method getTravelingByUser()
     * @description Getter method to return traveling in specific city.
     * @param User $user
     * @return string
     */
    final public function getTravelingByUser(User $user): string
    {
        $data = [
            'user_travels' => $user->travels
        ];

        return json_encode($data);
    }


    /**
     * @method createTravel()
     * @description Setter method to create a new travel.
     *      Validates json input. If validation passes,
     *      create new travel in database.
     * @param Request $request
     * @return object
     *
     * @todo Update the initialization of a new cravel with more parameters from input.
     *
     */
    final public function createTravel(Request $request): object
    {
        $request->validate([
            'city_id' => ['Required', 'integer'],
            'user_id' => ['Required', 'integer'],
            'bike_id' => ['Required', 'integer']
        ]);

        return Travel::create($request->all());
    }


    /**
     * @method updateTravel()
     * @description Setter method to update travel in database.
     *      Get existing travel then update it from all request attributes.
     * @param Request $request
     * @return object
     */
    final public function updateTravel(Request $request): object
    {
        $user = Travel::find($request->id);
        $user->update($request->all());

        return $user;
    }


    /**
     * @method deleteTravel()
     * @description Setter method to remove travel from database table/collection.
     *      Get existing travel then remove it from database table/collection.
     * @param Request $request
     * @return object
     */
    final public function deleteTravel(Request $request): object
    {
        $travel = Travel::find($request->id);
        $travel->delete($travel);

        return $travel;
    }
}
