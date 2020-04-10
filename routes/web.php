<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect(route("students.login")); //this redirect to login page of teacher
})->name('welcome');

Auth::routes();

Route::get('/register', 'Auth\RegisterController@register')->name('register')->middleware('auth:admin');

/* admin login and dashboard Routes */
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

/*Routes of admin*/
Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/list', 'AdminController@list')->name('admin.list');
    Route::get('/add', 'AdminController@create')->name('admin.add');
    Route::post('/add', 'AdminController@store')->name('admin.add');
    Route::get('/show/{id}', 'AdminController@show')->name('admin.show');
    Route::put('/show/{id}', 'AdminController@edit')->name('admin.update');
    Route::delete('/delete/{id}', 'AdminController@destroy')->name('admin.delete');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::put('/changePassword', 'AdminController@changePassword')->name('admin.changePassword');

    /* admin/student/--- */
    Route::prefix('students')->group(function () {
        Route::get("/", 'Admin\StudentController@index')->name('admin.students');
        Route::get("/add", 'Admin\StudentController@create')->name('admin.students.add');
        Route::post("/add", 'Admin\StudentController@store')->name('admin.students.add');
        Route::get('/show/{id}', 'Admin\StudentController@show')->name('admin.students.show');
        Route::put('/show/{id}', 'Admin\StudentController@edit')->name('admin.students.update');
        Route::delete("/delete/{id}", 'Admin\StudentController@destroy')->name('admin.students.delete');
        Route::get('/paymentList', 'Admin\StudentController@feePaymentList')->name('admin.students.feePaymentList');
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
        Route::get('/', 'Admin\DepartmentController@index')->name('admin.department');
        Route::get('/add', 'Admin\DepartmentController@create')->name('admin.department.add');
        Route::post('/add', 'Admin\DepartmentController@store')->name('admin.department.add');
        Route::get('/show/{id}', 'Admin\DepartmentController@show')->name('admin.department.show');
        Route::put('/show/{id}', 'Admin\DepartmentController@edit')->name('admin.department.update');
        Route::delete('/delete/{id}', 'Admin\DepartmentController@destroy')->name('admin.department.delete');
    });
    /* admin/classroom */
    Route::group(['prefix' => 'classroom'], function () {
        Route::get('/', 'Admin\ClassroomController@index')->name('admin.classroom');
        Route::get('/add', 'Admin\ClassroomController@create')->name('admin.classroom.add');
        Route::post('/add', 'Admin\ClassroomController@store')->name('admin.classroom.add');
        Route::get('/show/{id}', 'Admin\ClassroomController@show')->name('admin.classroom.show');
        Route::put('/show/{id}', 'Admin\ClassroomController@edit')->name('admin.classroom.update');
        Route::delete('/delete/{id}', 'Admin\ClassroomController@destroy')->name('admin.classroom.delete');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::get('/', 'Admin\MessageController@index')->name('admin.message');
    });
    Route::group(['prefix' => 'notice'], function () {
        Route::get('/', 'Admin\NoticeController@index')->name('admin.notice');
        Route::get('/add', 'Admin\NoticeController@create')->name('admin.notice.add');
        Route::post('/add', 'Admin\NoticeController@store')->name('admin.notice.add');
        Route::get('/show/{id}', 'Admin\NoticeController@show')->name('admin.notice.show');
        Route::put('/show/{id}', 'Admin\NoticeController@edit')->name('admin.notice.update');
        Route::delete('/delete/{id}', 'Admin\NoticeController@destroy')->name('admin.notice.delete');
    });
});
Route::prefix('students')->group(function () {
    Route::get('/login', 'Auth\StudentsLoginController@showLoginForm')->name('students.login');
    Route::post('/login', 'Auth\StudentsLoginController@login')->name('students.login.submit');
});

Route::group(['middleware' => 'auth:students', 'prefix' => 'students'], function () {
    Route::get('/', 'Students\StudentsController@index')->name('students.dashboard');
    Route::get('/profile', 'Students\StudentsController@index')->name('students.profile');
    Route::get('/notice', 'Students\StudentsController@notice')->name('students.notice');
    Route::group(['prefix' => 'payment'], function () {
        Route::get('/', 'Students\PaymentController@index')->name('students.payment');
        Route::post('/', 'Students\PaymentController@createPayment')->name('students.payment');
        Route::get('/executePayment', 'Students\PaymentController@executePayment')->name('students.executePayment');
    });
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', 'Students\FeedbackController@index')->name('students.feedback');
        Route::post('/', 'Students\FeedbackController@store')->name('students.feedback');
    });
});
