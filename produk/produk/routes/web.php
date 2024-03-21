<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('produk', ['uses' => 'ProdukController@showAll']);
    $router->get('produk/{id}', ['uses' => 'ProdukController@showOne']);
    $router->post('produk', ['uses' => 'ProdukController@create']);
    $router->delete('produk/{id}', ['uses' => 'ProdukController@delete']);
    $router->put('produk/{id}', ['uses' => 'ProdukController@update']);

    // jwt-auth
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->post('logout', ['uses' => 'AuthController@logout']);
    $router->post('refresh', ['uses' => 'AuthController@refresh']);
    $router->post('user-profile', ['uses' => 'AuthController@me']);
});