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

// Route::get('/', function () {
//     return view('pages/front/homepage');
// });
// Route::get('/home', function () {
//     return view('pages/front/homepage');
// });
// Route::get('/cek-jadwal', 'HomeController@cekjadwal')->name('home.cekjadwal');

// Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'API\HomepageController@index')->name('homepage');
Route::get('/home', 'API\HomepageController@index')->name('homepage');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group( ['middleware' => ['auth','cors','roleAdmin']], function() {

});