<?php
use Illuminate\Support\Facades\Route;

Route::get('login', 'LoginController@index')->name('login.show'); 
Route::post('login', 'LoginController@login')->name('login.send'); 