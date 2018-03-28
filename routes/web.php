<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','PropertyController@index')->name('home');

Route::get('/properties', 'PropertyController@index')->name('all_properties');

Route::get('/new', 'PropertyController@create')->name('new_property');
Route::post('/create', 'PropertyController@save')->name('save_property');

Route::post('/edit', 'PropertyController@doEdit')->name('update_property');
Route::get('/edit/{property}','PropertyController@edit');

Route::post('/delete', 'PropertyController@doDelete')->name('do_delete');
Route::get('/delete/{property}', 'PropertyController@delete')->name('delete_property');

Route::get('/properties/{property}/houses', 'HouseController@index')->name('property_houses');
Route::get('/properties/houses/new', 'HouseController@create')->name('new_house');
Route::post('/properties/houses/save', 'HouseController@save')->name('save_house');


