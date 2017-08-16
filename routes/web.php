<?php

Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
