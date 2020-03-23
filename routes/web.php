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
$router->group(['prefix' => '/api', 'middleware' => 'autenticador'], function () use ($router){
    $router->post('/series', 'SeriesController@store');
    $router->get('/series/{id}', 'SeriesController@show');
    $router->get('/series', 'SeriesController@index');
    $router->put('/series/{id}', 'SeriesController@update');
    $router->delete('/series/{id}', 'SeriesController@destroy');

    $router->get('/{serieId}/episodios', 'EpisodiosController@buscarPorSerie');

    $router->post('/episodios', 'EpisodiosController@store');
    $router->get('/episodios/{id}', 'EpisodiosController@show');
    $router->get('/episodios', 'EpisodiosController@index');
    $router->put('/episodios/{id}', 'EpisodiosController@update');
    $router->delete('/episodios/{id}', 'EpisodiosController@destroy');
});

$router->post('/api/login', 'TokenController@gerarToken');

