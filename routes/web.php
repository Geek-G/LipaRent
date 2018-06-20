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
    return view('landing.home');
});

Route::get('/vue', function () {
    return view('landing.vue');
});


Route::get('/pricing', function () {
    return view('landing.pricing');
})->name('pricing');


Route::get('/signup', function () {
    return view('landlord.signup');
});

Route::get('/dashboard', function () {
    return view('landlord.dashboard');
});



Auth::routes();

Route::get('/home','HomeController@index')->name('home');

Route::resource('house','HouseController');
Route::resource('property','PropertyController');
Route::resource('landlord','LandlordController');
Route::resource('tenant','TenantController');




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|Routes for Vue XHR
|
*/

