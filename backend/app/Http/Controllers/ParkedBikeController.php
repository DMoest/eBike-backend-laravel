<?php


namespace App\Http\Controllers;
use App\Models\Bike;
use App\Models\ParkedBike;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * @description Controller for getting & setting parked bikes.
 */
class ParkedBikeController extends Controller
{
    /**
     * @method getBikesParkedInZone()
     * @description Getter method to return bikes at specific parking zone.
     *
     * @param ParkedBike $parkedBike
     * @return JsonResponse
     */
    final public function getBikesParkedInZone(ParkedBike $parkedBike): JsonResponse
    {
        $data = [ 'parked_bikes' => Bike::where('_id', $parkedBike->bike_id)->get() ];

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
     * @method parkBikesInParkingZone()
     * @description Setter method to create/park a bike. Request must contain the json attributes
     *      'bike_id', 'parking_id' and 'status' to create a parked bike.
     *
     * @param Request $request
     * @return JsonResponse
     */
    final public function parkBikesInParkingZone(Request $request): JsonResponse
    {
        $request->validate([
            'bike_id' => ['Required', 'integer'],
            'parking_id' => ['Required', 'integer'],
            'status' => ['Required', 'string']
        ]);

        $parkedBike = ParkedBike::create($request->all());

        return response()->json(
            $parkedBike,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateParkBikeAtParkingZone()
     * @description Setter method to update a parked bike. Request must contain the keys
     *      'bike_id', 'parking_id' and 'status' to create a parked bike.
     *
     * @param Request $request
     * @return JsonResponse
     */
    final public function updateParkBikeAtParkingZone(Request $request): JsonResponse
    {
        $parkedBike = ParkedBike::find($request->_id);
        $parkedBike->update($request->all());

        return response()->json(
            $parkedBike,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteParkedBikeAtParkingZone()
     * @description Setter method to delete a parked bike. Request must contain the keys
     *      'bike_id', 'parking_id' and 'status' to create a parked bike.
     *
     * @param Request $request
     * @return JsonResponse
     */
    final public function deleteParkedBikeAtParkingZone(Request $request): JsonResponse
    {
        $parkedBike = ParkedBike::find($request->_id);
        $parkedBike->delete($request->_id);

        return response()->json(
            $parkedBike,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
