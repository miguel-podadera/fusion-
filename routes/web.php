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

Route::get('/home', 'HomeController@index')->name('boards.index');
Route::get('/board/{id}', 'BoardsController@show')->name('boards.show');
Route::post('/boards/store', 'BoardsController@store')->name('boards.store');
Route::post('/boards/list/{id}', 'ListController@store')->name('lists.store');
Route::post('/boards/ticket/{id}', 'TicketController@store')->name('tickets.store');

Route::get('/profil', 'ProfilController@edit')->name('profil');
Route::post('/profil/update/{id}', 'ProfilController@update')->name('profil.update');
