<?php

use Illuminate\Support\Facades\Route;

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

//public
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
	return view('auth.login');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
	Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
	Route::get('/user/profile-setting', 'App\Http\Controllers\ProfileController@index')->name('profile-setting');
	Route::post('/user/profile-setting', 'App\Http\Controllers\ProfileController@store')->name('store-profile');
	Route::put('/user/profile-setting/{username}', 'App\Http\Controllers\ProfileController@update')->name('update-profile');
	Route::get('/user/account-setting', 'App\Http\Controllers\AkunController@index')->name('account-setting');
	Route::put('/user/account-setting', 'App\Http\Controllers\AkunController@update')->name('account-update');
});

// for student
Route::group(['middleware' => ['auth', 'role:student']], function() { 
	Route::get('/lowongan-tim', 'App\Http\Controllers\LowonganTimController@index')->name('lowongan-tim');
	Route::get('/lowongan-tim/create', 'App\Http\Controllers\LowonganTimController@create')->name('buat-lowongan-tim');

	Route::get('/kawan-mahasiswa', 'App\Http\Controllers\KawanMahasiwaController@index')->name('kawan-mahasiswa');
	Route::get('/kawan-mahasiswa/detail/{username}', 'App\Http\Controllers\KawanMahasiwaController@show')->name('show-kawan-mahasiswa');

	Route::get('/list-pembimbing', 'App\Http\Controllers\ListPembimbingController@index')->name('list-pembimbing');
	Route::get('/list-pembimbing/detail/{id}', 'App\Http\Controllers\ListPembimbingController@show')->name('show-list-pembimbing');

	Route::get('/submission', 'App\Http\Controllers\SubmissionController@index')->name('submission');
	Route::get('/submission/create', 'App\Http\Controllers\SubmissionController@create')->name('create-submission');
	Route::post('/submission', 'App\Http\Controllers\SubmissionController@store')->name('store-submission');
	Route::get('/submission/detail/{id}', 'App\Http\Controllers\SubmissionController@show')->name('show-submission');
});

// for reviewer
Route::group(['middleware' => ['auth', 'role:reviewer']], function() { 
	Route::get('/karya', 'App\Http\Controllers\DashboardController@postcreate')->name('karya');
});

// for admin
Route::group(['middleware' => ['auth', 'role:admin']], function() { 
	Route::get('/kegiatan', 'App\Http\Controllers\DashboardController@postcreate')->name('kegiatan');
	Route::get('/pengumuman', 'App\Http\Controllers\DashboardController@postcreate')->name('pengumuman');
	Route::get('/berita', 'App\Http\Controllers\DashboardController@postcreate')->name('berita');
	Route::get('/dosen', 'App\Http\Controllers\DashboardController@postcreate')->name('dosen');
	Route::get('/mahasiswa', 'App\Http\Controllers\DashboardController@postcreate')->name('mahasiswa');
	Route::get('/arsip-pkp', 'App\Http\Controllers\DashboardController@postcreate')->name('arsip-pkm');
	Route::get('/arsip-poster-pimnas', 'App\Http\Controllers\DashboardController@postcreate')->name('arsip-pimnas');
});
require __DIR__.'/auth.php';
