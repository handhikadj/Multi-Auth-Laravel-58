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

Auth::routes();

Route::get('/', function () { return redirect('login'); });

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () { return redirect('admin/login'); });
    Route::get('login', 'Auth\LoginController@showAdminLoginForm');
    Route::post('login', 'Auth\LoginController@adminLogin')->name('adminloginsubmit');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/home', function () {
            return view('admin_view');
        });
    }); 
});

Route::group(['prefix' => 'guru'], function () {
    Route::get('/', function () { return redirect('guru/login'); });
    Route::get('login', 'Auth\LoginController@showGuruLoginForm');
    Route::post('login', 'Auth\LoginController@guruLogin')->name('guruloginsubmit');

    Route::group(['middleware' => ['auth:guru']], function () {
        Route::get('/home', function () {
            return view('guru_view');
        });
    }); 
});

Route::group(['prefix' => 'siswa'], function () {
    Route::get('/', function () { return redirect('siswa/login'); });
    Route::get('login', 'Auth\LoginController@showsiswaLoginForm');
    Route::post('login', 'Auth\LoginController@siswaLogin')->name('siswaloginsubmit');

    Route::group(['middleware' => ['auth:siswa']], function () {
        Route::get('/home', function () {
            return view('siswa_view');
        });
    }); 
});