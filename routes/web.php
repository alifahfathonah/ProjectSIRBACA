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
    return view('home.section.index');
});
Route::get('/cetak', function () {
    return view('auth.pages.cetak');
});
Route::get('/notiv', function () {
    return view('home.section.notiv');
});

Route::post('/pendaftarantamu', 'PublicController@svanggota');
Route::post('/savetamu', 'PublicController@ckanggota');
Route::post('/savebukutamu', 'PublicController@svbukutamu');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/pencarian/buku/tamu', 'HomeController@pencarianbktamu');
Route::get('/home/cek/anggota', 'HomeController@cekanggota');
Route::put('/home/update/anggota/{id}', 'HomeController@upanggota');
Route::delete('/home/delete/anggota/{id}', 'HomeController@dlanggota');
Route::get('/home/laporan/harian', 'HomeController@harian');
Route::get('/home/laporan/bulanan', 'HomeController@bulanan');
Route::get('/home/laporan/tahunan', 'HomeController@tahunan');
Route::get('/home/cetak/laporan/{link}/harian', 'HomeController@cetak');
Route::get('/home/edit/user/root', 'HomeController@getuser');
Route::put('/home/edit/user/root/{id}', 'HomeController@upuser');

Route::post('/home/activitas','HomeController@svactivasi');
Route::put('/home/activitas/{id}','HomeController@upactivasi');
