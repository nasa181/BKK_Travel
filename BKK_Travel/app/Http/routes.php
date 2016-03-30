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

Route::get('/','web_controller@start_page');
Route::get('/page_travel/list_of_travel/{page}','web_controller@page_travel');
Route::get('/page_restaurant/info/{id}','web_controller@res_info');
Route::get('/page_travel/info/{id}','web_controller@attr_info');
Route::get('/page_event/info/{id}','web_controller@event_info');
Route::get('/register_page','web_controller@register_page');
Route::get('/page_all/create_review/{id}','web_controller@createReview');
Route::post('/search','web_controller@search');
Route::post('/page_travel/post_review','web_controller@postReview');
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
