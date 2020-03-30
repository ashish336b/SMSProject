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

Route::get('/', function () {
    return redirect(route("login")); //this redirect to login page of teacher
})->name('welcome');

Auth::routes();

//Route::get('/register','Auth\RegisterController@register')->name('register')->middleware('auth:admin');


/* admin login and dashboard Routes */
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

/*Routes of admin*/
Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    /* admin/student/--- */
    Route::prefix('students')->group(function () {
        Route::get("/", 'Admin\StudentController@index')->name('admin.students');
    });
    /* admin/teachers/--- */
    Route::prefix('teachers')->group(function () {
        Route::get('/', 'Admin\TeacherController@index')->name('admin.teachers');
        Route::get('/add', 'Admin\TeacherController@create')->name('admin.teachers.add');
        Route::post('/add', 'Admin\TeacherController@store')->name('admin.teachers.add');
        Route::get('/show/{id}', 'Admin\TeacherController@show')->name('admin.teachers.show');
        Route::put('/show/{id}', 'Admin\TeacherController@edit')->name('admin.teachers.update');
        Route::delete('/delete/{id}', 'Admin\TeacherController@destroy')->name('admin.teachers.delete');
    });
    Route::group(['prefix' => 'department'], function () {
        Route::get('/','Admin\DepartmentController@index')->name('admin.department');
    });
});

Route::prefix('students')->group(function () {
    Route::get('/login', 'Auth\StudentsLoginController@showLoginForm')->name('students.login');
    Route::post('/login', 'Auth\StudentsLoginController@login')->name('students.login.submit');
    Route::get('/', 'StudentsController@index')->name('students.dashboard');
});
