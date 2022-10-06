<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Front\FrontController@index')->name('front.index');
Route::get('/visitors', 'Front\FrontController@visitors')->name('front.visitors');
Route::get('works/list/{page}/{take}', 'Front\FrontController@getWorksView')->name('front.works.list');
Route::post('contact/send', 'Front\FrontController@sendEmail')->name('front.contact.send');


Route::get('work/{system_name}', 'Front\FrontController@showWork')->name('front.works.show');

Route::get('set-visit-api/{id}', 'Front\FrontController@setVisitPage')->name('front.set-visitit-api');