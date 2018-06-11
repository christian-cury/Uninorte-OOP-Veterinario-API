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

Route::group(['prefix' => 'api/v1'], function(){
    Route::get('consultas/{token}', "ConsultasController@consultas")->where('token', '[A-Za-z0-9]+')->where('order', '[A-Za-z]+')->where('limit', '[0-9]+');
    Route::get('consultas/{token}/{limit}', "ConsultasController@consultas")->where('token', '[A-Za-z0-9]+')->where('order', '[A-Za-z]+')->where('limit', '[0-9]+');
    Route::get('consultas/{token}/{limit}/{order}', "ConsultasController@consultas")->where('token', '[A-Za-z0-9]+')->where('order', '[A-Za-z]+')->where('limit', '[0-9]+');
    Route::post('consultas/create', "ConsultasController@create");
    Route::post('consultas/edit/{id}', "ConsultasController@edit")->where('id', '[0-9]+');
    Route::post('consultas/delete', "ConsultasController@delete");
});
