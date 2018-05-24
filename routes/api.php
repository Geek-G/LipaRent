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

Route::get('/property','PropertyControllerApi@index');
Route::get('/property/type','PropertyControllerApi@types');
Route::get('/property/{id}','PropertyControllerApi@show');
Route::post('/property','PropertyControllerApi@store');
Route::put('/property','PropertyControllerApi@update');
Route::delete('/property/{id}','PropertyControllerApi@destroy');


//Route::resource('property','PropertyApiController');
// Route::resource('house','HouseController');
// Route::resource('landlord','LandlordController');
// Route::resource('tenant','TenantController');

