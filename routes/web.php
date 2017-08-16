<?php

Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/resend', 'Auth\ActivationController@resend')->name('auth.resend');
Route::post('auth/resend', 'Auth\ActivationController@send');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
