<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    echo "INDEX ROUTE: .....";
});

Route::get('/something', function (Request $request) {
    echo "SOMETHING ROUTE: .....";

    return $request;
});


Route::get('/bikes', function (Request $request) {
    echo "BIKE ROUTE: .....";

    return $request;
});

/**
 * User Routes.
 */
Route::get('/user', [UserController::class, 'getUsers'])->name('users');
Route::get('/user/{id}', [UserController::class, 'getUser'])->name('user');
