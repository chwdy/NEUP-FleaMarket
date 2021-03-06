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
use Illuminate\Http\Request;


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


Route::group(['middleware' => ['web']],function () {

    Route::get('/', [
        "uses" => "ContentController@Mainpage",
    ]);

    Route::get('/good', [
        "uses" => "GoodController@getList",
        "middleware" => "auth"
    ]);

    Route::match(['post', 'get'], '/good/add', [
        "uses" => "GoodController@addGood",
        "middleware" => "auth"
    ]);

    Route::match(['post', 'get'], '/good/mygood', [
        "uses" => "GoodController@mygood",
        "middleware" => "auth"
    ]);

    Route::match(['post', 'get'], '/good/check', [
        "uses" => "GoodController@check",
        "middleware" => "auth"
    ]);

    Route::match(['post', 'get'], '/good/end', [
        "uses" => "GoodController@end",
        "middleware" => "auth"
    ]);
    
    Route::match(['post', 'get'], '/good/{good_id}/edit', [
        "uses" => "GoodController@editGood",
        "middleware" => "auth"
    ]);

    Route::delete('/good/{good_id}/delete', [
        "uses" => "GoodController@deleteGood",
        "middleware" => "auth"
    ]);

    Route::post('/good/{good_id}/buy', [
        "uses" => "GoodController@getGood",
        "middleware" => "auth"
    ]);

    Route::post('/good/{good_id}/{id}', [
        "uses" => "GoodController@allow",
        "middleware" => "auth"
    ]);

    Route::get('/good/titlepic/{good_id}', [
        "uses" => "GoodController@getTitlePic"
    ]);

    Route::get('/good/quick_access', [
        "uses" => "GoodController@quickAccess",
        "middleware" => "auth"
    ]);

    Route::get('/good/{good_id}', [
        "uses" => "GoodController@getInfo",
        "middleware" => "auth"
    ]);

    Route::get('/user/{user_id}/edit', [
        "uses" => "UserController@showEditPage",
        "middleware" => "auth"
    ]);

    Route::post('/user/{user_id}/edit/middle', [
        "uses" => "UserController@editList",
        "middleware" => "auth"
    ]);

	Route::get('/good/{good_id}/add_favlist', [
		"uses" => "GoodController@addFavlist",
		"middleware" => "auth"
	]);

    Route::get('/good/{good_id}/check', [
        "uses" => "AdminController@checkGood",
        "middleware" => "admin"
    ]);

    Route::get('/admin', [
        "uses" => "AdminController@adminIndex",
        "middleware" => "admin"
    ]);

    Route::post('/user/{user_id}/updatePriv', [
        "uses" => "AdminController@updateUserPriv",
        "middleware" => "admin"
    ]);

    Route::post('/user/{user_id}/updateRole', [
        "uses" => "AdminController@updateUserRole",
        "middleware" => "admin"
    ]);

    Route::get('/user/{user_id}/sendCheckLetter', [
        "uses" => "UserController@sendCheckLetter"
    ]);

    Route::get('/user/checkEmail/{token}', [
        "uses" => "UserController@checkEmail"
    ]);

    Route::get('/user/{user_id}', [
        "uses" => "UserController@getList",
        "middleware" => "auth"
    ]);

    Route::post('/cat/{cat_id}/edit', [
        "uses" => "AdminController@editCategory",
        "middleware" => "admin"
    ]);

    Route::post('/cat/{cat_id}/edit', [
        "uses" => "AdminController@editCategory",
        "middleware" => "admin"
    ]);

    Route::delete('/cat/{cat_id}/delete', [
        "uses" => "AdminController@deleteCategory",
        "middleware" => "admin"
    ]);

    Route::match(['post', 'get'], '/register', [
        "uses" => "UserController@register"
    ]);

    Route::match(['post', 'get'], '/login', [
        "uses" => "UserController@login"
    ]);

    Route::get('/logout', [
        "uses" => "UserController@logOut"
    ]);

    Route::match(['post', 'get'], '/iforgotit', [
        "uses" => "UserController@passwordReset"
    ]);

    Route::match(['post', 'get'], '/passwordReset/{token}', [
        "uses" => "UserController@resetPassword"
    ]);
});