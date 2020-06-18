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

$router->group(['prefix' => 'api'], function () use ($router) {
    //Cadastro
    $router->post('register', 'AuthController@register');

    $router->post('login', 'AuthController@login');

    $router->get("/profile", "UserController@profile");

    $router->get("/type/", "UserController@getType");

    $router->group(['prefix' => "/user"], function () use ($router){
        $router->get("/", "UserController@getAll");
        $router->get("/{id}", "UserController@get");
        $router->post("/", "UserController@store");
        $router->put("/{id}", "UserController@update");
        $router->delete("/{id}", "UserController@destroy");
    });

    $router->group(['prefix' => "/clinic"], function () use ($router){
        $router->get("/", "ClinicController@getAll");
        $router->get("/{id}", "ClinicController@get");
        $router->post("/", "ClinicController@store");
        $router->put("/{id}", "ClinicController@update");
        $router->delete("/{id}", "ClinicController@destroy");
    });

    $router->group(['prefix' => "/professional"], function () use ($router){
        $router->get("/", "ProfessionalController@getAll");
        $router->get("/{id}", "ProfessionalController@get");
        $router->post("/", "ProfessionalController@store");
        $router->put("/{id}", "ProfessionalController@update");
        $router->delete("/{id}", "ProfessionalController@destroy");
    });

    $router->group(['prefix' => "/patient"], function () use ($router){
        $router->get("/", "PatientController@getAll");
        $router->get("/{id}", "PatientController@get");
        $router->post("/", "PatientController@store");
        $router->put("/{id}", "PatientController@update");
        $router->delete("/{id}", "PatientController@destroy");
    });

});


