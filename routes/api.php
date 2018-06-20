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

Route::get('/location/county','Api\LocationControllerApi@getCounties');
Route::get('/location/town','Api\LocationControllerApi@getTowns');
Route::post('/location/town/search','Api\LocationControllerApi@searchTown');
Route::post('/location/street/search','Api\LocationControllerApi@searchStreet');
Route::get('/location/street','Api\LocationControllerApi@getStreets');

Route::get('/property','Api\PropertyControllerApi@index');
Route::get('/property/type','Api\PropertyControllerApi@types');
Route::get('/property/{id}','Api\PropertyControllerApi@show');
Route::post('/property','Api\PropertyControllerApi@store');
Route::put('/property','Api\PropertyControllerApi@update');
Route::delete('/property/{id}','Api\PropertyControllerApi@destroy');

Route::get('/house','Api\HouseControllerApi@index');


Route::post('/newhouse','Api\HouseControllerApi@store');

