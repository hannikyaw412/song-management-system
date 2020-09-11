<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'singers'], function () use ($router) {

    $router->post('/', 'SingerController@store');

    $router->get('/', 'SingerController@show');

    $router->get('/index/{id}', 'SingerController@showIndex');
});

Route::group(['prefix' => 'writers'], function () use ($router) {

    $router->post('/', 'WriterController@store');

    $router->get('/', 'WriterController@show');
});

Route::group(['prefix' => 'productions'], function () use ($router) {

    $router->post('/', 'ProductionController@store');

    $router->get('/', 'ProductionController@show');
});

Route::group(['prefix' => 'studios'], function () use ($router) {

    $router->post('/', 'StudioController@store');

    $router->get('/', 'StudioController@show');
});

Route::group(['prefix' => 'songs'], function () use ($router) {

    $router->post('/', 'SongsController@store');

    $router->get('/', 'SongsController@show');
});

Route::group(['prefix' => 'albums'], function () use ($router) {

    $router->post('/', 'AlbumController@store');

    $router->get('/', 'AlbumController@show');
});

Route::group(['prefix' => 'albumWithSongs'], function () use ($router) {

    $router->post('/', 'AlbumWithSongsController@store');

    $router->get('/', 'AlbumWithSongsController@show');

    $router->get('/index', 'AlbumWithSongsController@index');
});

Route::group(['prefix' => 'bands'], function () use ($router) {

    $router->post('/', 'BandController@store');

    $router->get('/', 'BandController@show');
});
