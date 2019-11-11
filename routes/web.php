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

// Masuk Halaman Dashboard
Route::get('/', [
    'uses' => 'ProgressController@index'
]);
// Menampilkan Seluruh Data
Route::get('/home',[
    'uses' => 'ProgressController@home'
]);
// Detail Progress
Route::get('/progress/detail/{id}', [
    'uses' => 'ProgressController@detail'
]);
Route::get('/progress/create', [
    'uses' => 'ProgressController@create'
]);
Route::post('/progress', [
    'uses' => 'ProgressController@store'
]);
Route::get('/progress/update/{id}', [
    'uses' => 'ProgressController@edit'
]);
// Proses Ubah data
Route::patch('/progress/{id}', [
    'uses' => 'ProgressController@ubahData'
]);     
// Halaman Detail Berkas Laporan & Verifikasi Laporan
Route::get('/berkas', [
    'uses' => 'ProgressController@lihatBerkas'
]);
// Halaman Upload Berkas
Route::get('/berkas/upload/{id}', [
    'uses' => 'ProgressController@upload'
]);
// Proses Upload Berkas
Route::post('/berkas', [
    'uses' => 'ProgressController@uploadBerkas'
]);
// Update Berkas
Route::get('/berkas/update/{id}', [
    'uses' => 'ProgressController@updateBerkas'
]);
// Proses Update Berkas
Route::patch('/berkas/{id}', [
    'uses' => 'ProgressController@prosesUpdate'
]);