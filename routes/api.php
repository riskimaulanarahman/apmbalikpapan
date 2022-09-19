<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cek-detail/{id}','API\LaporanController@cekdetail')->name('laporan.cek');


//lapor RT
Route::apiResource('laporan-warga', 'API\LaporanController');
Route::apiResource('laporan-rt', 'API\LaporanRtController');

//master data
Route::apiResource('kecamatan', 'API\KecamatanController');
Route::apiResource('kelurahan', 'API\KelurahanController');
Route::apiResource('rt', 'API\RtController');

// list option
Route::get('list-kecamatan','API\ListController@listKecamatan');
Route::get('list-kelurahan','API\ListController@listKelurahan');