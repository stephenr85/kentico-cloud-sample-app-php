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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/articles/show/{slug}', 'ArticlesController@detail');

Route::get('/cafes', 'CafesController@index')->name('cafes');

Route::get('/contacts', 'ContactsController@index')->name('contacts');

Route::any('/partnership', 'PartnershipController@index')->name('partnership');

Route::get('/product-catalog', 'ProductsController@index')->name('products');;

Route::get('/product-catalog/detail/{slug}', 'ProductsController@detail')->name('product.detail');

Route::get('/product-catalog/coffees', 'CoffeesController@index');
Route::get('/product-catalog/coffees/filter', 'CoffeesController@filter')->name('products.coffees.filter');

Route::get('/product-catalog/brewers', 'BrewersController@index');
Route::get('/product-catalog/brewers/filter', 'BrewersController@filter')->name('products.brewers.filter');

/* DEBUGGING ONLY */
Route::get('/dump/items', 'DumpController@items');
Route::get('/dump/item/{codename}', 'DumpController@item');

Route::get('/dump/taxonomies', 'DumpController@taxonomies');
Route::get('/dump/taxonomy/{codename}', 'DumpController@taxonomy');