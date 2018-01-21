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

Route::get('/', 'PageController@index');
Route::get('/lottery/{url}', 'PageController@lottery')->name('lottery');
Route::get('/prediction/{id}', 'PageController@prediction')->name('prediction');
Route::post('/prediction/{id}', 'PayController@prediction')->name('payPrediction');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/change-password','AdminController@changePassword')->name('changePassword');
    Route::get('/config','AdminController@config')->name('config');
    Route::post('/change-password','AdminController@postChangePassword')->name('postChangePassword');
    Route::post('/config','AdminController@postConfig')->name('postConfig');
    Route::resource('prediction','PredictionController');
    Route::resource('history','HistoryController');
});

Auth::routes();
