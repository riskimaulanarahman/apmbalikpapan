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



Route::group( ['prefix' => 'admin','as' => 'admin.','middleware' => ['auth','roleAdmin']], function() {


    Route::get('/dashboard-admin', 'API\LaporanController@indexadmin')->name('dashboard-admin');
    Route::get('/laporan', 'API\LaporanController@laporanforadmin')->name('laporan');
    Route::get('/laporan/show/{id}', 'API\LaporanController@showforadmin')->name('showlaporan');
    Route::delete('/laporan/{id}', 'API\LaporanController@destroy')->name('deletelaporan');
    Route::get('/laporan/respon/{id}', 'API\LaporanController@respon')->name('responlaporan');
    Route::post('/laporan/updateaksi/{id}','API\LaporanController@updateaksi')->name('laporanupdateaksi');


    //Start Route Master User
    Route::get('/master-user', 'SA_MasterUserController@index')->name('sa-user-index');
    Route::get('/master-user/tambah', 'SA_MasterUserController@tambah')->name('sa-user-tambah');
    Route::post('/master-user/store', 'SA_MasterUserController@store')->name('sa-user-store');
    Route::get('/master-user/edit/{id}', 'SA_MasterUserController@edit')->name('sa-user-edit');
    Route::post('/master-user/update/{id}', 'SA_MasterUserController@update')->name('sa-user-update');
    Route::get('/master-user/deleted/{id}', 'SA_MasterUserController@deleted')->name('sa-user-deleted');
    //End
    
});

