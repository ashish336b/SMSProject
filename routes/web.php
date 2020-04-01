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
        Route::get("/add", 'Admin\StudentController@create')->name('admin.students.add');
        Route::post("/add", 'Admin\StudentController@store')->name('admin.students.add');
        Route::get('/show/{id}', 'Admin\StudentController@show')->name('admin.students.show');
        Route::put('/show/{id}', 'Admin\StudentController@edit')->name('admin.students.update');
        Route::delete("/delete/{id}", 'Admin\StudentController@destroy')->name('admin.students.delete');
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
    /* admin/department */
    Route::group(['prefix' => 'department'], function () {
        Route::get('/','Admin\DepartmentController@index')->name('admin.department');
        Route::get('/add','Admin\DepartmentController@create')->name('admin.department.add');
        Route::post('/add','Admin\DepartmentController@store')->name('admin.department.add');
        Route::get('/show/{id}','Admin\DepartmentController@show')->name('admin.department.show');
        Route::put('/show/{id}','Admin\DepartmentController@edit')->name('admin.department.update');
        Route::delete('/delete/{id}','Admin\DepartmentController@destroy')->name('admin.department.delete');
    });
    /* admin/classroom */
    Route::group(['prefix' => 'classroom'], function () {
        Route::get('/','Admin\ClassroomController@index')->name('admin.classroom');
        Route::get('/add','Admin\ClassroomController@create')->name('admin.classroom.add');
        Route::post('/add','Admin\ClassroomController@store')->name('admin.classroom.add');
        Route::get('/show/{id}','Admin\ClassroomController@show')->name('admin.classroom.show');
        Route::put('/show/{id}','Admin\ClassroomController@edit')->name('admin.classroom.update');
        Route::delete('/delete/{id}','Admin\ClassroomController@destroy')->name('admin.classroom.delete');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::get('/','Admin\MessageController@index')->name('admin.message');
    });
    Route::group(['prefix' => 'notification'], function () {
        Route::get('/','Admin\NotificationController@index')->name('admin.notification');
        Route::get('/add', 'Admin\NotificationController@create')->name('admin.notification.add');
        Route::post('/add', 'Admin\NotificationController@store')->name('admin.notification.add');
        Route::get('/show/{id}', 'Admin\NotificationController@show')->name('admin.notification.show');
        Route::put('/show/{id}', 'Admin\NotificationController@edit')->name('admin.notification.update');
        Route::delete('/delete/{id}', 'Admin\NotificationController@destroy')->name('admin.notification.delete');
    });
});

Route::prefix('students')->group(function () {
    Route::get('/login', 'Auth\StudentsLoginController@showLoginForm')->name('students.login');
    Route::post('/login', 'Auth\StudentsLoginController@login')->name('students.login.submit');
    Route::get('/', 'StudentsController@index')->name('students.dashboard');
});
