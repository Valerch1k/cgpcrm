<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
Route::post('/register','Auth\ApiAuthController@register')->name('register.api');

Route::group(['middleware'=>'auth:api'],function (){

    Route::group([
        'prefix' => 'clients',
        'namespace' => 'Api\v1'
    ], function (){
        Route::get('/', 'ClientController@index');
        Route::get('/{id}', 'ClientController@show');
        Route::get('client_companies/{id}', 'ClientController@getClientCompanies');
        Route::post('/', 'ClientController@store');
        Route::put('/{id}', 'ClientController@update');
        Route::delete('/{id}', 'ClientController@delete');
    });

    Route::group([
        'prefix' => 'companies',
        'namespace' => 'Api\v1'
    ], function (){
        Route::get('/', 'CompanyController@index');
        Route::get('/{id}', 'CompanyController@show');
        Route::post('/', 'CompanyController@store');
        Route::put('/{id}', 'CompanyController@update');
        Route::delete('/{id}', 'CompanyController@delete');
    });

});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
