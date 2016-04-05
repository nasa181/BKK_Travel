<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//========== start page ============
Route::get('/','web_controller@start_page');


//=========== view summary of all item ===========
Route::get('/page_travel/list_of_travel/{page}','web_controller@page_travel');
Route::get('/page_restaurant/list_of_restaurant/{page}','web_controller@page_restaurant');
Route::get('/page_event/list_of_event/{page}','web_controller@page_event');


//========== view info of each item ==========
Route::get('/page_travel/info/{id}','web_controller@attr_info');
Route::get('/page_event/info/{id}','web_controller@event_info');
Route::get('/page_restaurant/info/{id}','web_controller@res_info');



//=========== about user (profile, login, logout, register) =========
Route::get('/view_profile','web_controller@viewProfile');
Route::post('/login','web_controller@login');
Route::get('/register_page','web_controller@register_page');
Route::post('/register/input','web_controller@register');



//========== adding new item ===========
Route::get('/page_restaurant/create_new_restaurant','web_controller@createNewRestaurant');
Route::get('/page_attraction/create_new_attraction','web_controller@createNewAttraction');
Route::get('/page_event/create_new_event','web_controller@createNewEvent');
Route::post('/page_travel/add_new_attraction','web_controller@addAttraction');
Route::post('/page_travel/add_new_restaurant','web_controller@addRestaurant');
Route::post('/page_travel/add_new_event','web_controller@addEvent');


//========== review ==========
Route::get('/page_all/create_review/{id}','web_controller@createReview');
Route::post('/search','web_controller@search');
Route::post('/page_travel/post_review','web_controller@postReviewTravel');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
