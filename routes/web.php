<?php

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

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/personal-data', 'HomeController@myprofile')->name('personal-data');

    Route::namespace('Group')->group(function () {
        Route::middleware(['ajax', 'admin'])->group(function () {
            Route::resource('division', 'GroupDivisionController')->except([
                'create', 'index', 'show'
            ]);

            Route::resource('group', 'CRUDController')->except([
                'create', 'index'
            ]);

            Route::resource('group/{group}/studyPlan', 'SubjectController')->except([
                'create', 'index', 'show'
            ]);

            Route::resource('group/{group}/{studyPlan}/schedule', 'ScheduleController')->except([
                'create', 'show'
            ]);
        });

        Route::middleware('admin')->group(function () {
            Route::get('/group/{group}', 'CRUDController@show')->name('group.show');
        });

        
        Route::get('/group', 'CRUDController@index')->name('group.index');
    });


    Route::namespace('Admin')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::get('/users', 'UserController@index')->name('user.index');
            Route::get('/users/{user}', 'UserController@edit')->name('user.update');
            Route::put('/users/{user}', 'UserController@update')->name('user.update');
            Route::delete('/users/{user}', 'UserController@destroy')->name('user.destroy');
            Route::get('/user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('/user/register', 'Auth\RegisterController@register');
        });
    });

    Route::middleware('admin')->group(function () {
        Route::get('/user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/user/register', 'Auth\RegisterController@register');
    });

    Route::namespace('Account')->group(function () {
        Route::middleware('ajax')->group(function () {
            Route::put('/my-account', 'MyAccountController@update')->name('account.update');
        });
        Route::get('/my-account', 'MyAccountController@index')->name('account.index');
    });
});

Auth::routes(['verify' => false, 'register' => false]);
