<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use App\Models\Bike;
use App\Models\Travel;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    final public function getTravels(): JsonResponse
    {
        $data = Travel::with('city', 'bike')->get();

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getTravel()
     * @description Getter method to return specific travel from database.
     * @param Travel $travel
     * @return JsonResponse
     */
    final public function getTravel(Travel $travel): JsonResponse
    {
        return response()->json(
            $travel,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getTravelingInCity()
     * @description Getter method to return traveling in specific city.
     * @param City $city
     * @return JsonResponse
     */
    final public function getTravelingInCity(City $city): JsonResponse
    {
        $data = Travel::where('city', $city->name)->get();

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getTravelingWithBike()
     * @description Getter method to return traveling with specific bike.
     * @param Bike $bike
     * @return JsonResponse
     */
    final public function getTravelingWithBike(Bike $bike): JsonResponse
    {
        $data = Travel::where('bike_id', $bike->_id)->get();

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getTravelingByUser()
     * @description Getter method to return traveling in specific city.
     * @param User $user
     * @return JsonResponse
     */
    final public function getTravelingByUser(User $user): JsonResponse
    {
        $data = Travel::where('user_id', $user->_id)->get();

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method createTravel()
     * @description Setter method to create a new travel.
     *      Validates json input. If validation passes,
     *      create new travel in database.
     * @param Request $request
     * @return object
     *
     * @todo Update the initialization of a new travel with validation for more parameters from input.
     *
     */
    final public function createTravel(Request $request): object
    {
        $request->validate([
            'city_id' => ['Required', 'integer'],
            'user_id' => ['Required', 'integer'],
            'bike_id' => ['Required', 'integer']
        ]);

        $newTravel = Travel::create($request->all());

        return response()->json(
            $newTravel,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateTravel()
     * @description Setter method to update travel in database.
     *      Get existing travel then update it from all request attributes.
     * @param Request $request
     * @return string
     */
    final public function updateTravel(Request $request): string
    {
        $travel = Travel::find($request->_id);
        $travel->update($request->all());

        return response()->json(
            $travel,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteTravel()
     * @description Setter method to remove travel from database table/collection.
     *      Get existing travel then remove it from database table/collection.
     * @param Request $request
     * @return string
     */
    final public function deleteTravel(Request $request): string
    {
        $travel = Travel::find($request->_id);
        $travel->delete($travel);

        return response()->json(
            $travel,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
