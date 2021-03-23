<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
Route::post('/register','Auth\ApiAuthController@register')->name('register.api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
