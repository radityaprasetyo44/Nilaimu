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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//NilaiMu

Route::group(['prefix' => 'api/v1'], function () {

    Route::group(['prefix' => 'auth'], function () {

        Route::get('login', 'NilaimuController@login')->name('login');

        Route::post('checklogin', 'NilaimuController@checklogin')->name('check');

    });

    Route::get('/teacher', 'NilaimuController@teacher')->name('dashboard');  

    Route::get('/student', 'NilaimuController@student');

    Route::get('/my-score', 'NilaimuController@myScore');
    
    Route::group(['prefix' => 'event'], function () {

        Route::get('/nilai-kelas', 'NilaimuController@nilaiKelas');  

    });        

});

//Study Excel

Route::get('/chart', 'UserChartController@index')->name('chart');

Route::get('/excel', 'ExcelController@index');

Route::get('/excel/export', 'ExcelController@excelExport');

Route::get('/excel/import', 'ExcelController@view');

Route::post('/excel/import_excel', 'ExcelController@import_excel');



