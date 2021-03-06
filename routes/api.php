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
Route::post('login', 'AbsenApiController@login');
Route::get('tugas/{id}', 'AbsenApiController@tugas');
Route::get('absen/{id}', 'AbsenApiController@absen');
Route::get('piket', 'AbsenApiController@piket');
Route::get('profile/{id}', 'AbsenApiController@profile');
Route::post('absenmasuk', 'AbsenApiController@absenMasuk');
Route::post('absenpulang', 'AbsenApiController@absenPulang');
