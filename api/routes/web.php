<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Region User
$router->post('/login', 'UserController@login');
$router->post('/register', 'UserController@register');
$router->get('/logout', 'UserController@logout');
$router->get('/profile/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);

// Region Surat
$router->get('/surat-masuk/get-all', 'SuratController@getAllSuratMasuk');
$router->get('/surat-keluar/get-all', 'SuratController@getAllSuratKeluar');
$router->get('/surat/get/{id}', 'SuratController@getOne');
$router->post('/surat/create', 'SuratController@create');
$router->post('/surat/update', 'SuratController@update');
$router->get('/surat/delete/{id}', 'SuratController@delete');
// endregion

// Region Rencana
$router->get('/rencana/get-all', 'RencanaController@getAllRencana');
$router->get('/rencana/get/{id}', 'RencanaController@getOne');
$router->post('/rencana/create', 'RencanaController@create');
$router->post('/rencana/update', 'RencanaController@update');
$router->get('/rencana/delete/{id}', 'RencanaController@delete');
// endregion

// Region Dokumen
$router->get('/dokumen/get-all', 'DokumenController@getAllDokumen');
$router->get('/dokumen/get/{id}', 'DokumenController@getOne');
$router->post('/dokumen/create', 'DokumenController@create');
$router->post('/dokumen/update', 'DokumenController@update');
$router->get('/dokumen/delete/{id}', 'DokumenController@delete');
// endregion

// Region Produk Hukum
$router->get('/produkhukum/get-all', 'ProdukHukumController@getAllProdukHukum');
$router->get('/produkhukum/get/{id}', 'ProdukHukumController@getOne');
$router->post('/produkhukum/create', 'ProdukHukumController@create');
$router->post('/produkhukum/update', 'ProdukHukumController@update');
$router->get('/produkhukum/delete/{id}', 'ProdukHukumController@delete');
// endregion