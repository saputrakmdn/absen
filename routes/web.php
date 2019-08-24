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

Route::get('/', 'QRCode@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('absen','AbsenController');
Route::resource('kelas','KelasController');
Route::resource('siswa', 'SiswaController');
Route::resource('guru', 'GuruController');
Route::resource('piket', 'PiketController');
Route::resource('info', 'InfoController');
Route::resource('tugas', 'TugasController');
Route::resource('jurusan', 'JurusanController');
Route::resource('absenguru', 'AbsenGuruController');
Route::get('kehadiran','AbsenController@input')->name('absen.input');
Route::get('absenkelas', 'AbsenController@kelas')->name('absen.kelas');
Route::get('absenkelas/{id}', 'AbsenController@absen')->name('kelas');
Route::get('absen/excel/{id}', 'AbsenController@excel')->name('excel');
Route::get('absen/excel/all/{id}', 'AbsenController@excelAll')->name('excel.all');
// Route::post('masuk','AbsenController@masuk')->name('absen.masuk');
// Route::post('keluar','AbsenController@keluar')->name('absen.keluar');
// Route::post('jam/{id}','AbsenController@jam')->name('absen.jam');
