<?php

use Illuminate\Http\Request;
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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Location Routes
|--------------------------------------------------------------------------
*/
Route::get('/location/county','Api\LocationControllerApi@getCounties');
Route::get('/location/town','Api\LocationControllerApi@getTowns');
Route::post('/location/town/search','Api\LocationControllerApi@searchTown');
Route::post('/location/street/search','Api\LocationControllerApi@searchStreet');
Route::get('/location/street','Api\LocationControllerApi@getStreets');

/*
|--------------------------------------------------------------------------
| Property Routes
|--------------------------------------------------------------------------
*/
Route::get('/property/type','Api\PropertyControllerApi@types');
Route::post('/property','Api\PropertyControllerApi@store');
Route::put('/property','Api\PropertyControllerApi@update');
Route::delete('/property/{id}','Api\PropertyControllerApi@destroy');

/*
|--------------------------------------------------------------------------
| Unit Routes
|--------------------------------------------------------------------------
*/
Route::get('/house','Api\HouseControllerApi@index');
Route::get('/house/{id}','Api\HouseControllerApi@show');
Route::post('/newhouse','Api\HouseControllerApi@store');

