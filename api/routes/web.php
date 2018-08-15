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
$router->get('/surat/get-all', 'SuratController@getAll');
$router->get('/surat/get/{id}', 'SuratController@getOne');
$router->post('/surat/create', 'SuratController@create');
$router->post('/surat/update', 'SuratController@update');
$router->post('/surat/delete', 'SuratController@delete');
