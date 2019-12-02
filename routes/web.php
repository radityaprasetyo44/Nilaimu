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

    Route::get('/teacher/{nama}', 'NilaimuController@teacher')->name('dashboard');  

    Route::get('/student/{nama}', 'NilaimuController@student');

    Route::get('/nilai-ku', 'NilaimuController@myScore');
    
    Route::group(['prefix' => 'event'], function () {

        Route::get('/nilai-kelas', 'NilaimuController@nilaiKelas');  

        Route::get('/hapus/{nama}', 'NilaimuController@deleteData');  

        Route::group(['prefix' => 'export'], function () {

            Route::get('/{nama}', 'ExcelController@excelExport');

            Route::get('/class/XIIRPL1', 'ExcelController@exportXIIRPL1');

            Route::get('/class/XIIRPL2', 'ExcelController@exportXIIRPL2');

            Route::get('/class/XIIRPL3', 'ExcelController@exportXIIRPL3');

            Route::get('/class/XIIRPL4', 'ExcelController@exportXIIRPL4');

            Route::get('/class/XIIRPL5', 'ExcelController@exportXIIRPL5');

            Route::get('/class/XIIRPL6', 'ExcelController@exportXIIRPL6');

        });

        Route::group(['prefix' => 'import'], function () {
            
            Route::post('/', 'ExcelController@importExcel');

        });

    });        

});

//Study Excel

Route::get('/chart', 'UserChartController@index')->name('chart');

Route::get('/excel', 'ExcelController@index');

Route::get('/excel/export', 'ExcelController@excelExport');

Route::get('/excel/import', 'ExcelController@view');

Route::post('/excel/import_excel', 'ExcelController@import_excel');



