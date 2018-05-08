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

Route::get('/', 'FundraiserController@index');
Route::get('/fundraiser/search/{searchTerms}', 'FundraiserController@search')->where('search', '[a-z0-9-]+');
Route::get('/fundraiser', 'FundraiserController@create');
Route::post('/fundraiser', 'FundraiserController@store');
Route::post('/fundraiser/{slug}/reviews/create', 'ReviewController@store');
Route::get('/fundraiser/{slug}/reviews/create', 'ReviewController@create');
Route::get('/fundraiser/{slug}', 'FundraiserController@show')->where('slug', '[a-z0-9-]+');





