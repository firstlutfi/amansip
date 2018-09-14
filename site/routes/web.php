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

// Test Page
Route::get('test', function () {
    return view('dashboard');
});

// Login Page
Route::get('/', 'Controller@index')->name('home');

// Authentication
Route::post('login', 'Controller@login')->name('login');
Route::post('register', 'Controller@register')->name('register');
Route::get('logout', 'Controller@logout')->name('logout');

// Region Surat
Route::get('/surat-masuk', 'SuratController@getAllSuratMasuk')->name('surat-masuk');
Route::get('/surat-masuk/new', 'SuratController@formSuratMasuk')->name('form-surat-masuk');
Route::get('/surat-keluar', 'SuratController@getAllSuratKeluar')->name('surat-keluar');
Route::get('/surat-keluar/new', 'SuratController@formSuratKeluar')->name('form-surat-keluar');
Route::get('/surat/get/{id}', 'SuratController@getSuratById')->name('get-surat-by-id');
Route::post('/surat/create', 'SuratController@actionCreate')->name('action-create-surat');
Route::post('/surat/update', 'SuratController@actionUpdate')->name('action-update-surat');
Route::get('/surat/delete/{id}', 'SuratController@actionDelete')->name('action-delete-surat');
// endregion

// Region Rencana
Route::get('/rencana-kegiatan', 'RencanaController@getAllRencana')->name('rencana');
Route::get('/rencana/new', 'RencanaController@formRencana')->name('form-rencana');
Route::get('/rencana/get/{id}', 'RencanaController@getRencanaById')->name('get-rencana-by-id');
Route::post('/rencana/create', 'RencanaController@actionCreate')->name('action-create-rencana');
Route::post('/rencana/update', 'RencanaController@actionUpdate')->name('action-update-rencana');
Route::get('/rencana/delete/{id}', 'RencanaController@actionDelete')->name('action-delete-rencana');
// endregion

// Region Dokumen
Route::get('/dokumen-kegiatan', 'DokumenController@getAllDokumen')->name('dokumen');
Route::get('/dokumen/new', 'DokumenController@formDokumen')->name('form-dokumen');
Route::get('/dokumen/get/{id}', 'DokumenController@getDokumenById')->name('get-dokumen-by-id');
Route::post('/dokumen/create', 'DokumenController@actionCreate')->name('action-create-dokumen');
Route::post('/dokumen/update', 'DokumenController@actionUpdate')->name('action-update-dokumen');
Route::get('/dokumen/delete/{id}', 'DokumenController@actionDelete')->name('action-delete-dokumen');
// endregion

// Region ProdukHukum
Route::get('/produk-hukum', 'ProdukHukumController@getAllProdukHukum')->name('produkhukum');
Route::get('/produkhukum/new', 'ProdukHukumController@formProdukHukum')->name('form-produkhukum');
Route::get('/produkhukum/get/{id}', 'ProdukHukumController@getProdukHukumById')->name('get-produkhukum-by-id');
Route::post('/produkhukum/create', 'ProdukHukumController@actionCreate')->name('action-create-produkhukum');
Route::post('/produkhukum/update', 'ProdukHukumController@actionUpdate')->name('action-update-produkhukum');
Route::get('/produkhukum/delete/{id}', 'ProdukHukumController@actionDelete')->name('action-delete-produkhukum');
// endregion
