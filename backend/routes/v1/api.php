<?php

/**
 * Declared namespaces in use.
 */

use App\Http\Controllers\ChargingBikeController;
use App\Http\Controllers\ParkedBikeController;
use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ParkingZoneController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



/**
 * @description User Routes are for handling requests relevant to users in the system.
 *      All user related routes are grouped under '/user' route.
 *      Full CRUD supported for users in the database.
 *      Authentication supported for user login through AuthenticationController.
 */
//Route::middleware(['auth:api', 'scopes:api_user'])->prefix('/')->group(function() {
Route::prefix('/')->group(function() {

    /**
     * @description User Bike Routes for handling database requests relevant to bikes.
     *      Limited CRUD supported for bikes in database.
     */
    Route::get('/bike', [BikeController::class, 'getBikes']);
    Route::get('/bike/{bike:_id}', [BikeController::class, 'getBike']);
    Route::get('/bike/city/{city:name}', [BikeController::class, 'getBikesInCity']);


    /**
     * @description Charge Routes.
     */
    Route::post('/charge', [CheckoutController::class, 'charge']);


    /**
     * @description City Routes are for handling database requests relevant to cities.
     *      Limited CRUD supported for cities in database.
     */
    Route::get('/city', [CityController::class, 'getCities']);
    Route::get('/city/{city:name}', [CityController::class, 'getCity']);


    /**
     * @description Parking Zone are for handling database requests relevant to parking zones.
     *      Limited CRUD supported for parking zones in database.
     */
    Route::get('/parking', [ParkingZoneController::class, 'getParkingZones']);
    Route::get('/parking/{parking:_id}', [ParkingZoneController::class, 'getParkingZone']);
    Route::get('/parking/city/{city:name}', [ParkingZoneController::class, 'getParkingZonesInCity']);


    /**
     * @description Station Routes are for handling database requests relevant to station.
     *      Limited CRUD supported for all stations in database.
     */
    Route::get('/station', [StationController::class, 'getStations']);
    Route::get('/station/{station:_id}', [StationController::class, 'getStation']);
    Route::get('/station/city/{city:name}', [StationController::class, 'getStationsInCity']);


    /**
     * @description Travel Routes are for handling database requests relevant to travels.
     *      All user related routes are grouped under '/travel' route.
     *      Limited CRUD supported for travels table in database.
     */
    Route::get('/travel/{travel}', [TravelController::class, 'getTravels']);
    Route::get('/travel/user/{user:_id}', [TravelController::class, 'getTravelingByUser']);
    Route::post('/travel', [TravelController::class, 'createTravel']);
    Route::put('/travel', [TravelController::class, 'updateTravel']);


    /**
    * @description User Routes are for handling requests relevant to users.
    *      All user related routes are grouped under '/user' route.
    *      Limited CRUD supported for user in the database.
    *      Authentication supported for user login through AuthenticationController.
    */
    Route::get('/user/{user:_id}', [UserController::class, 'getUser']);
    Route::get('/user/city/{city:name}', [UserController::class, 'getUsersInCity']);
    Route::put('/user', [UserController::class, 'updateUser']);
});



/**
 * @description Admin User Routes are for handling requests relevant to users in the system.
 *      All user related routes are grouped under '/user' route.
 *      Full CRUD supported for users in the database.
 *      Authentication supported for user login through AuthenticationController.
 */
//Route::middleware(['auth:api_admin', 'scopes:api_admin'])->prefix('/admin')->group(function() {
Route::prefix('/admin')->group(function() {
    /**
     * @description Developer Index route.
     */
    Route::get('/', function () {
        $data = [
            "/" => "Routes Index (this route)",

            "*> BIKE ROUTES" => "------------------------------",
            "/bike - GET Request" => "Return all bikes",
            "/bike - POST Request" => "Create a new bike",
            "/bike - PUT Request" => "Update a bike with bike_id",
            "/bike - DELETE Request" => "Delete a bike with bike_id",
            "/bike/bike_id - GET Request" => "Return a bike from bike_id",
            "/bike/city/city_name - GET Request" => "Return all bikes in city from city_name",

            "*> CHARGE ROUTES" => "------------------------------",
            "/charge - POST Request" => "?",

            "*> CITY ROUTES" => "------------------------------",
            "/city - GET Request" => "Return all cities",
            "/city - POST Request" => "Create a new city",
            "/city - PUT Request" => "Update a city by city_id",
            "/city - DELETE Request" => "Delete a city by city_id",
            "/city/city_name - GET Request" => " Return a specific city from city_name",

            "*> PARKING ROUTES" => "------------------------------",
            "/parking - GET Request" => "Return all parking zones",
            "/parking - POST Request" => "Create a new Parking zone",
            "/parking - PUT Request" => "Update a parking zones",
            "/parking - DELETE Request" => "DELETE a parking zone",
            "/parking/parking_id - GET Request" => "Return a parking zone from parking_id",
            "/parking/bike/parking_id - GET Request" => "Return all parked bikes in parking zone from parking_id",
            "/parking/city/city_name - GET Request" => "Return all parking zone in a city from city_name",

            "*> STATION ROUTES" => "------------------------------",
            "/station - GET Request" => "Return all stations",
            "/station - POST Request" => "Create a new station",
            "/station - PUT Request" => "Update an existing station with station_id",
            "/station - DELETE Request" => "Delete a station with station_id",
            "/station/station_id - GET Request" => "Return a station from station_id",
            "/station/city/city_name" => "GET Request - Return all stations in city from city_name",

            "*> TRAVEL ROUTES" => "------------------------------",
            "/travel - GET Request" => "Return all travels",
            "/travel - POST Request" => "Create a new travel",
            "/travel - PUT Request" => "Update a travel",
            "/travel - DELETE Request" => "Delete a travel",
            "/travel/travel_id - GET Request" => "Return a travel from travel_id",
            "/travel/city/city_name - GET Request" => "Return all travels in a city from city_name",
            "/travel/bike/bike_id - GET Request" => "Return all travels made by a specific bike from bike_id",
            "/travel/user/user_id - GET Request" => "Return all travels made by a specific user with user_id",

            "*> USER ROUTES" => "------------------------------",
            "/user - GET Request" => "Return all users",
            "/user - POST Request" => "Create a new users",
            "/user - PUT Request" => "Update a user",
            "/user - DELETE Request" => "Delete a user",
            "/user\/user_id - GET Request" => "Return a user from user_id"
        ];

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    });

    Route::get('/bike', [BikeController::class, 'getBikes']);
    Route::get('/bike/{bike:_id}', [BikeController::class, 'getBike']);
    Route::post('/bike', [BikeController::class, 'createBike']);
    Route::put('/bike', [BikeController::class, 'updateBike']);
    Route::delete('/bike', [BikeController::class, 'deleteBike']);
    Route::get('/bike/city/{city:name}', [BikeController::class, 'getBikesInCity']);


    Route::post('/charge', [CheckoutController::class, 'charge']);


    Route::get('/city', [CityController::class, 'getCities']);
    Route::get('/city/{city:name}', [CityController::class, 'getCity']);
    Route::post('/city', [CityController::class, 'addCity']);
    Route::put('/city', [CityController::class, 'updateCity']);
    Route::delete('/city', [CityController::class, 'deleteCity']);


    Route::get('/parking', [ParkingZoneController::class, 'getParkingZones']);
    Route::get('/parking/{parking:_id}', [ParkingZoneController::class, 'getParkingZone']);
    Route::post('/parking', [ParkingZoneController::class, 'createParkingZone']);
    Route::put('/parking', [ParkingZoneController::class, 'updateParkingZone']);
    Route::delete('/parking', [ParkingZoneController::class, 'deleteParkingZone']);
    Route::get('/parking/city/{city:name}', [ParkingZoneController::class, 'getParkingZonesInCity']);
    Route::get('/parking/bikes/{parking:_id}', [ParkedBikeController::class, 'getBikesParkedInZone']);
    Route::post('/parking/bikes', [ParkedBikeController::class, 'parkBikesInParkingZone']);
    Route::put('/parking/bikes', [ParkedBikeController::class, 'updateParkBikeAtParkingZone']);
    Route::delete('/parking/bikes', [ParkedBikeController::class, 'deleteParkedBikeAtParkingZone']);


    Route::get('/station', [StationController::class, 'getStations']);
    Route::get('/station/{station:_id}', [StationController::class, 'getStation']);
    Route::post('/station', [StationController::class, 'createStation']);
    Route::put('/station', [StationController::class, 'updateStation']);
    Route::delete('/station', [StationController::class, 'deleteStation']);
    Route::get('/station/city/{city:name}', [StationController::class, 'getStationsInCity']);
    Route::get('/station/bikes/{station:_id}', [ChargingBikeController::class, 'getBikesChargingAtStation']);
    Route::post('/station/bikes', [ChargingBikeController::class, 'chargeBikeAtStation']);
    Route::put('/station/bikes', [ChargingBikeController::class, 'updateChargingBikeAtStation']);
    Route::delete('/station/bikes', [ChargingBikeController::class, 'deleteChargingBikeAtStation']);


    Route::get('/travel', [TravelController::class, 'getTravels']);
    Route::get('/travel/{travel}', [TravelController::class, 'getTravels']);
    Route::get('/travel/city/{city:name}', [TravelController::class, 'getTravelingInCity']);
    Route::get('/travel/bike/{bike:_id}', [TravelController::class, 'getTravelingWithBike']);
    Route::post('/travel/bike/{bike:_id}', [TravelController::class, 'parkBikesInParkingZone']);
    Route::get('/travel/user/{user:_id}', [TravelController::class, 'getTravelingByUser']);
    Route::post('/travel', [TravelController::class, 'createTravel']);
    Route::put('/travel', [TravelController::class, 'updateTravel']);
    Route::delete('/travel', [TravelController::class, 'deleteTravel']);


    Route::get('/user', [UserController::class, 'getUsers']);
    Route::get('/user/{user:_id}', [UserController::class, 'getUser']);
    Route::get('/user/city/{city:name}', [UserController::class, 'getUsersInCity']);
    Route::post('/user/', [UserController::class, 'createUser']);
    Route::put('/user', [UserController::class, 'updateUser']);
    Route::delete('/user', [UserController::class, 'deleteUser']);
});



/**
 * @description Routes for demo simulations.
 */
Route::prefix('/simulation')->group(function () {
    Route::get('/bike', [BikeController::class, 'getBikes']);
    Route::get('/bike/{bike:_id}', [BikeController::class, 'getBike']);
    Route::post('/bike', [BikeController::class, 'createBike']);
    Route::put('/bike', [BikeController::class, 'updateBike']);
    Route::delete('/bike', [BikeController::class, 'deleteBike']);
    Route::get('/bike/city/{city:name}', [BikeController::class, 'getBikesInCity']);


    Route::post('/charge', [CheckoutController::class, 'charge']);


    Route::get('/city', [CityController::class, 'getCities']);
    Route::get('/city/{city:name}', [CityController::class, 'getCity']);
    Route::post('/city', [CityController::class, 'addCity']);
    Route::put('/city', [CityController::class, 'updateCity']);
    Route::delete('/city', [CityController::class, 'deleteCity']);


    Route::get('/parking', [ParkingZoneController::class, 'getParkingZones']);
    Route::get('/parking/{parking:_id}', [ParkingZoneController::class, 'getParkingZone']);
    Route::post('/parking', [ParkingZoneController::class, 'createParkingZone']);
    Route::put('/parking', [ParkingZoneController::class, 'updateParkingZone']);
    Route::delete('/parking', [ParkingZoneController::class, 'deleteParkingZone']);
    Route::get('/parking/city/{city:name}', [ParkingZoneController::class, 'getParkingZonesInCity']);
    Route::get('/parking/bikes/{parking:_id}', [ParkedBikeController::class, 'getBikesParkedInZone']);
    Route::post('/parking/bikes', [ParkedBikeController::class, 'parkBikesInParkingZone']);
    Route::put('/parking/bikes', [ParkedBikeController::class, 'updateParkBikeAtParkingZone']);
    Route::delete('/parking/bikes', [ParkedBikeController::class, 'deleteParkedBikeAtParkingZone']);


    Route::get('/station', [StationController::class, 'getStations']);
    Route::get('/station/{station:_id}', [StationController::class, 'getStation']);
    Route::post('/station', [StationController::class, 'createStation']);
    Route::put('/station', [StationController::class, 'updateStation']);
    Route::delete('/station', [StationController::class, 'deleteStation']);
    Route::get('/station/city/{city:name}', [StationController::class, 'getStationsInCity']);
    Route::get('/station/bikes/{station:_id}', [ChargingBikeController::class, 'getBikesChargingAtStation']);
    Route::post('/station/bikes', [ChargingBikeController::class, 'chargeBikeAtStation']);
    Route::put('/station/bikes', [ChargingBikeController::class, 'updateChargingBikeAtStation']);
    Route::delete('/station/bikes', [ChargingBikeController::class, 'deleteChargingBikeAtStation']);


    Route::get('/travel', [TravelController::class, 'getTravels']);
    Route::get('/travel/{travel}', [TravelController::class, 'getTravels']);
    Route::get('/travel/city/{city:name}', [TravelController::class, 'getTravelingInCity']);
    Route::get('/travel/bike/{bike:_id}', [TravelController::class, 'getTravelingWithBike']);
    Route::post('/travel/bike/{bike:_id}', [TravelController::class, 'parkBikesInParkingZone']);
    Route::get('/travel/user/{user:_id}', [TravelController::class, 'getTravelingByUser']);
    Route::post('/travel', [TravelController::class, 'createTravel']);
    Route::put('/travel', [TravelController::class, 'updateTravel']);
    Route::delete('/travel', [TravelController::class, 'deleteTravel']);


    Route::get('/user', [UserController::class, 'getUsers']);
    Route::get('/user/{user:_id}', [UserController::class, 'getUser']);
    Route::get('/user/city/{city:name}', [UserController::class, 'getUsersInCity']);
    Route::post('/user/', [UserController::class, 'createUser']);
    Route::put('/user', [UserController::class, 'updateUser']);
    Route::delete('/user', [UserController::class, 'deleteUser']);
});
