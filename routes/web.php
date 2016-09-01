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
Route::get('/admin/profiles/{id}','Admin\AdminUsersController@singleUserProfile');
Route::get('/admin/profiles/{id}/edit','Admin\AdminUsersController@editUserProfile');
Route::get('/admin/profiles/user/add', ['uses' => 'Admin\AdminController@addUserView']);
Route::get('/user/store','Admin\AdminUsersController@store');
Route::get('/user/edit','Admin\AdminUsersController@edit');
Route::get('/admin/profile/filter', ['uses' => 'Admin\AdminUsersController@filterUsers']);
Route::get('/admin/classes/filter', ['uses' => 'Admin\AdminClassesController@filterClasses']);

Route::get('/admin/levelsclasses','Admin\AdminClassesController@index');
Route::get('/admin/levelsclasses/class/{id}/students','Admin\AdminClassesController@showClassStudents');
Route::get('/admin/levelsclasses/class/{id}/teachers','Admin\AdminClassesController@showClassTeachers');
Route::get('/admin/levelsclasses/level/{id}/students','Admin\AdminClassesController@showLevelStudents');
Route::get('/admin/levelsclasses/level/{id}/teachers','Admin\AdminClassesController@showLevelTeachers');

Route::get('/admin/delete/user', ['uses' => 'Admin\AdminUsersController@delete']);
Route::get('/admin/show/user/password', ['uses' => 'Admin\AdminUsersController@getPassword']);
Route::get('/admin/levelsclasses/class','Admin\AdminClassesController@addClassView');
Route::get('/admin/levelsclasses/level','Admin\AdminClassesController@addLevelView');
Route::get('/admin/class/add','Admin\AdminClassesController@addClass');
Route::get('/admin/level/add','Admin\AdminClassesController@addLevel');
});

//teacher routes
Route::group(['middleware' => 'teacher'], function()
{
    Route::get('/teacher', ['as' => 'teacher_dashboard', 'uses' => 'TeacherController@getHome']);
    Route::get('/teacher/classes','TeacherController@showClasses');
    Route::get('/teacher/classes/{class_id}/students','TeacherController@showClassStudents')->middleware('class_belongs_to_teacher');
});

//student routes
Route::group(['middleware' => 'student'], function()
{
    Route::get('/student', ['as' => 'student_dashboard', 'uses' => 'StudentController@getHome']);
    Route::get('/student/classes','StudentController@showClasses');
});

//parent routes
Route::group(['middleware' => 'parent'], function()
{
    Route::get('/parent', ['as' => 'parent_dashboard', 'uses' => 'ParentController@getHome']);
});

Route::group(['middleware' => 'sentauth'], function()
{
    Route::get('/profile', ['uses' => 'ProfileController@showProfile']);
    Route::get('/profile/edit', ['uses' => 'ProfileController@editProfileView']);
    Route::get('/edit/profile', ['uses' => 'ProfileController@editProfile']);
});
