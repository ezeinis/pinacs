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
Route::get('/', ['as' => 'login_view', 'uses' => 'AuthAuthController@index']);
//auth
Route::get('login', ['as' => 'login_view', 'uses' => 'AuthAuthController@index']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthAuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthAuthController@logout']);

//admin routes
Route::group(['middleware' => 'admin'], function()
{
Route::get('/admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
Route::resource('admin/profiles', 'Admin\AdminUsersController', ['only' => ['index', 'store']]);
Route::get('/admin/add/{user_role}', ['uses' => 'Admin\AdminController@addUserView']);
Route::get('/user/store','Admin\AdminUsersController@store');
Route::get('/admin/profiles/{role}', ['uses' => 'Admin\AdminUsersController@filterByRole']);
Route::get('/admin/classes','Admin\AdminClassesController@index');
});

//teacher routes
Route::group(['middleware' => 'teacher'], function()
{
    Route::get('/teacher', ['as' => 'teacher_dashboard', 'uses' => 'TeacherController@getHome']);
});

//student routes
Route::group(['middleware' => 'student'], function()
{
    Route::get('/student', ['as' => 'student_dashboard', 'uses' => 'StudentController@getHome']);
});

//parent routes
Route::group(['middleware' => 'parent'], function()
{
    Route::get('/parent', ['as' => 'parent_dashboard', 'uses' => 'ParentController@getHome']);

});

Route::group(['middleware' => 'sentauth'], function()
{
    Route::get('/profile', ['uses' => 'ProfileController@showProfile']);
});
