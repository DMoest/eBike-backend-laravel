<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/**
 * City routes.
 */
Route::get('/city', [CityController::class, 'getCities']);
Route::get('/city/{city}', [CityController::class, 'getCity']);


/**
 * Station routes.
 */
Route::get('/station', [StationController::class, 'getStations']);
Route::get('/station/{station}', [StationController::class, 'getStation']);
Route::get('/station/city/{city:id}', [StationController::class, 'getStationsInCity']);


/**
 * Bike routes.
 */
Route::get('/bike', [BikeController::class, 'getBikes']);
Route::get('/bike/{bike}', [BikeController::class, 'getBike']);
Route::get('/bike/city/{city:id}', [BikeController::class, 'getBikesInCity']);


/**
 * User Routes.
 */
Route::get('/user', [UserController::class, 'getUsers']);
Route::get('/user/{user}', [UserController::class, 'getUser']);
Route::get('/user/city/{city:id}', [UserController::class, 'getUsersInCity']);
Route::post('/user', [UserController::class, 'createUser']);
Route::put('/user', [UserController::class, 'updateUser']);


/**
 * Travel Routes.
 */
Route::get('/travel', [TravelController::class, 'getTravels']);
Route::get('/travel/{travel}', [TravelController::class, 'getTravels']);
Route::get('/travel/city/{city:id}', [TravelController::class, 'getTravelingInCity']);
