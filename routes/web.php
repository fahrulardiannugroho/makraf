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
// Route::get('/', function () {
// });
Route::get('/', 'App\Http\Controllers\PublikDashboardController@index')->name('publik_dashboard');
Route::get('/info-kegiatan', 'App\Http\Controllers\PublikKegiatanController@index')->name('publik_kegiatan');
Route::get('/info-kegiatan/detail/{id}', 'App\Http\Controllers\PublikKegiatanController@show')->name('publik_kegiatan.show');

Route::get('/info-berita', 'App\Http\Controllers\PublikBeritaController@index')->name('publik_berita');
Route::get('/info-berita/detail/{id}', 'App\Http\Controllers\PublikBeritaController@show')->name('publik_berita.show');

Route::get('/faq', function () {
	return view('publik.faq.index');
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
	Route::post('/lowongan-tim', 'App\Http\Controllers\LowonganTimController@store')->name('store-lowongan');
	Route::get('/lowongan-tim/detail/{id}', 'App\Http\Controllers\LowonganTimController@show')->name('show-lowongan');

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
	Route::get('/submission-mahasiswa', 'App\Http\Controllers\SubmissionController@index')->name('submission-mahasiswa');
	Route::get('/submission-mahasiswa/detail/{id}', 'App\Http\Controllers\SubmissionController@show')->name('show-submission-mahasiswa');
	Route::post('/submission-mahasiswa/detail/sedang-direview/{id}', 'App\Http\Controllers\SubmissionController@updateSedangDireview')->name('edit-sedang-direview-submission-mahasiswa');
	Route::post('/submission-mahasiswa/detail/telah-direview/{id}', 'App\Http\Controllers\SubmissionController@updateTelahDireview')->name('edit-telah-direview-submission-mahasiswa');
	Route::get('/submission-mahasiswa/detail/tambah-saran/{id}', 'App\Http\Controllers\SubmissionController@createSaran')->name('show-submission-mahasiswa');
	Route::put('/submission-mahasiswa/detail/tambah-saran/{id}', 'App\Http\Controllers\SubmissionController@updateHasilReview')->name('edit-hasil-review-submission-mahasiswa');
});

// for admin
Route::group(['middleware' => ['auth', 'role:admin']], function() { 
	Route::get('/kegiatan', 'App\Http\Controllers\KegiatanController@index')->name('kegiatan');
	Route::get('/kegiatan/create', 'App\Http\Controllers\KegiatanController@create')->name('kegiatan.create');
	Route::post('/kegiatan/create', 'App\Http\Controllers\KegiatanController@store')->name('kegiatan.store');
	Route::get('/kegiatan/detail/{id}', 'App\Http\Controllers\KegiatanController@show')->name('kegiatan.show');
	Route::get('/kegiatan/edit/{id}', 'App\Http\Controllers\KegiatanController@edit')->name('kegiatan.edit');
	Route::put('/kegiatan/edit/{id}', 'App\Http\Controllers\KegiatanController@update')->name('kegiatan.update');
	Route::delete('/kegiatan/delete/{id}', 'App\Http\Controllers\KegiatanController@destroy')->name('kegiatan.destroy');
	
	Route::get('/berita', 'App\Http\Controllers\BeritaController@index')->name('berita');
	Route::get('/berita/create', 'App\Http\Controllers\BeritaController@create')->name('berita.create');
	Route::post('/berita/create', 'App\Http\Controllers\BeritaController@store')->name('berita.store');
	Route::get('/berita/detail/{id}', 'App\Http\Controllers\BeritaController@show')->name('berita.show');
	Route::get('/berita/edit/{id}', 'App\Http\Controllers\BeritaController@edit')->name('berita.edit');
	Route::put('/berita/edit/{id}', 'App\Http\Controllers\BeritaController@update')->name('berita.update');
	Route::delete('/berita/delete/{id}', 'App\Http\Controllers\BeritaController@destroy')->name('berita.destroy');
	
	Route::get('/arsip-pkm-pkp', 'App\Http\Controllers\ArsipPkmPkpController@index')->name('arsip_pkm_pkp');
	Route::get('/arsip-pkm-pkp/create', 'App\Http\Controllers\ArsipPkmPkpController@create')->name('arsip_pkm_pkp.create');
	Route::post('/arsip-pkm-pkp/create', 'App\Http\Controllers\ArsipPkmPkpController@store')->name('arsip_pkm_pkp.store');
	Route::get('/arsip-pkm-pkp/edit/{id}', 'App\Http\Controllers\ArsipPkmPkpController@edit')->name('arsip_pkm_pkp.edit');
	Route::put('/arsip-pkm-pkp/edit/{id}', 'App\Http\Controllers\ArsipPkmPkpController@update')->name('arsip_pkm_pkp.update');
	Route::delete('/arsip-pkm-pkp/delete/{id}', 'App\Http\Controllers\ArsipPkmPkpController@destroy')->name('arsip_pkm_pkp.destroy');
	
	Route::get('/arsip-pimnas', 'App\Http\Controllers\ArsipPimnasController@index')->name('arsip_pimnas');
});
require __DIR__.'/auth.php';
