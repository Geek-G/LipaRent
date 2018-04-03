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
use App\User;
use App\Property;
use App\House;
use App\Landlord;
use App\Country;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homee', function () {
    return view('landlord.index');
});

Route::get('/sign', function () {
    return view('tenant.signup');
});


Route::get('/relate', function () {

    $user = User::find(auth()->user()->id);
    $landlord= $user->landlord;
    $properties= $landlord->property;
    return $properties;
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

Route::resource('house','HouseController');

