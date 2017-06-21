<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','View\MemberController@tologin');
Route::get('/sendsms/{phone}','Service\MemberController@sendsms');
Route::post('/check_register','Service\MemberController@register');
Route::post('/check_login','Service\MemberController@login');

//自定义一个中间件

Route::get('/home','View\HomeController@home');
ROute::get("/test",function (){
    return View("test");
});

