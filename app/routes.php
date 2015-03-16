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

Route::get('/', array('as' => 'index','uses' => 'IndexController@index'));

Route::get('/create_user', function(){
    $user = Sentry::createUser(array(
        'email' => 'vohoanglong07@gmail.com',
        'password' => '2871989',
        'username' => 'longheartfree',
        'first_name' => 'Long',
        'last_name' => 'Vo',
        'activated' => true,
        'permissions' => array('admin' => 1)
    ));

    return 'Done';
});

Route::any('member/signin', array('as' => 'signin', 'before' => 'is_login|csrf' , 'uses' => 'AuthController@signin'));

Route::get('member/signout', array('as' => 'signout', 'before' => 'check_user' ,'uses' => 'AuthController@signout'));

Route::get('member/signup', array('as' => 'signup', 'before' => 'is_login' ,'uses' => 'AuthController@signup'));

Route::post('member/do_signup', array('as' => 'do_signup','before' => 'csrf|is_login' ,'uses' => 'AuthController@doSignup'));

Route::get('member/change_password', array('as' => 'change_password', 'before' => 'check_user', 'uses' => 'AuthController@changePassword'));

Route::post('member/do_change_password', array('as' => 'do_change_password', 'before' => 'check_user|csrf', 'uses' => 'AuthController@doChangePassword'));

Route::get('member/forgot_password', array('as' => 'forgot_password', 'before' => 'is_login', 'uses' => 'AuthController@forgotPassword'));

Route::post('member/do_forgot_password', array('as' => 'do_forgot_password', 'before' => 'is_login|csrf', 'uses' => 'AuthController@doForgotPassword'));

Route::get('member/active/{username}/{code}', array('as' => 'active','before' => 'is_login', 'uses' => 'AuthController@getActiveReset'));

Route::get('create_cate', function(){
	Category::create(array(
		'title' => 'CodeIgniter Framework'
	));
	
	return 'Done';
});