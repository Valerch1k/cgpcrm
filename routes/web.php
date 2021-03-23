<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware'=>'auth'],function (){

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix'=>'companies'],function (){

        Route::get('/add','HomeController@view');

        Route::get('/edit/{company}','HomeController@viewEdit');

        Route::post('/edit/{company}','HomeController@edit');

        Route::post('/save','HomeController@save');

        Route::get('/delete/{company}','HomeController@delete');

    });
});
