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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/apartments', 'ApartmentController@index')->name('all_apartments');

Route::get('/new', 'ApartmentController@create')->name('new_apartment');
Route::post('/create', 'ApartmentController@save')->name('save_apartment');

Route::post('/edit', 'ApartmentController@doEdit')->name('update_apartment');
Route::get('/edit/{apartment}','ApartmentController@edit');

Route::post('/delete', 'ApartmentController@doDelete')->name('do_delete');
Route::get('/delete/{apartment}', 'ApartmentController@delete')->name('delete_apartment');


