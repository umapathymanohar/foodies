<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

 
Route::get( '/',                		 'UserController@login');
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');

Route::resource('businesses', 'BusinessesController');
Route::resource('restaurants', 'RestaurantsController');


// Route::get('restaurants/manage/{restaurant_id}', array('as' => 'restaurants.manage', 'uses' => 'RestaurantsController@manage'));

Route::resource('cuisines', 'CuisinesController');
Route::resource('restaurants.restaurantlocations', 'RestaurantlocationsController');
Route::resource('restaurant.menucategories', 'MenucategoriesController');

Route::get('menucategories/{restaurant_id}/createsubmenu/{category_id}',  array('as' => 'menucategories.createsubmenu', 'uses' => 'MenucategoriesController@createsubmenu')); 	

Route::get('categories/{category_id}/move/{move}', array('as' => 'categories.order', 'uses' => 'MenucategoriesController@change_category_order'));



Route::resource('categories.menuitems', 'MenuitemsController');
Route::get('items/{item_id}/move/{move}', array('as' => 'items.order', 'uses' => 'MenuitemsController@change_items_order'));


Route::resource('item.images', 'MenuitemimagesController');
Route::post('items/{item_id}/upload', array('as' => 'items.move', 'uses' => 'MenuitemsController@store'));
Route::resource('section.availablility', 'MenuitemavailabilitiesController');