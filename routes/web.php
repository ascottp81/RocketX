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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@closestCasino')->name('closest');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['web','auth']], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'AdminController@index');
        Route::get('/casinos', 'AdminController@casinoIndex');
        Route::get('/casinos/add', 'AdminController@casino');
        Route::get('/casinos/{id}/edit', 'AdminController@casino');
        Route::get('/casinos/{id}/delete', 'AdminController@casinoDelete');
        Route::post('/casinos', 'AdminController@casinoUpdate');

    });

});

