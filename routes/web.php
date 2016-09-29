<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ShopController@index')->name('home');
Route::get('/shops', 'ShopController@index')->name('shops');
Route::get('/shops/{id}', 'ShopController@show')->name('shop_details');

//Sitemap
Route::get('/sitemap.xml', 'SitemapController@sitemap');
