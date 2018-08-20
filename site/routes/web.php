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
$router->get('/surat-masuk', 'SuratController@getAllSuratMasuk')->name('surat-masuk');
$router->get('/surat-keluar', 'SuratController@getAllSuratKeluar')->name('surat-keluar');
$router->get('/surat/create', 'SuratController@create')->name('page-create-surat');
$router->get('/surat/update', 'SuratController@update')->name('page-update-surat');
$router->get('/surat/delete', 'SuratController@delete')->name('page-delete-surat');
$router->post('/surat/create', 'SuratController@actionAreate')->name('action-create-surat');
$router->post('/surat/update', 'SuratController@actionUpdate')->name('action-update-surat');
$router->post('/surat/delete', 'SuratController@actionDelete')->name('action-delete-surat');

