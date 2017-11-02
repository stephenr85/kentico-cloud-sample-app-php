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

Route::get('/', 'HomeController@index');

Route::get('/about', 'AboutController@index');

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/show/{codename}', 'ArticlesController@detail');

Route::get('/cafes', 'CafesController@index');

Route::get('/contacts', 'ContactsController@index');

Route::any('/partnership', 'PartnershipController@index');

Route::get('/product-catalog', 'ProductsController@index');

Route::get('/product-catalog/detail/{codename}', 'ProductsController@detail')->name('product.detail');

Route::get('/product-catalog/coffees', 'CoffeesController@index');
Route::get('/product-catalog/coffees/filter', 'CoffeesController@filter')->name('products.coffees.filter');

/* DEBUGGING ONLY */
Route::get('/dump/items', 'DumpController@items');
Route::get('/dump/item/{codename}', 'DumpController@item');

Route::get('/dump/taxonomies', 'DumpController@taxonomies');
Route::get('/dump/taxonomy/{codename}', 'DumpController@taxonomy');