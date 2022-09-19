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

Route::group( ['prefix' => 'reviewer','as' => 'reviewer.','middleware' => ['auth','roleReviewer']], function() {

    Route::resource('/laporan','API\LaporanController');
    // Route::get('/dashboard-rt/respon/{id}','API\LaporanRtController@respon')->name('dashboard-rt.respon');
    // Route::post('/dashboard-rt/laporan-updateaksi/{id}','API\LaporanRtController@updateaksi')->name('laporan.updateaksi');

    // Route::resource('/data-warga','API\DatawargartController');
    // Route::get('/reset-pass/{id}','API\DatawargartController@resetpass')->name('resetpass');




});

