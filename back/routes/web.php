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
        $router->get("/type", "UserController@getType");
        $router->get("/profile", "UserController@profile");
        $router->get("/{id}", "UserController@get");
        $router->post("/", "UserController@store");
        $router->put("/{id}", "UserController@update");
        $router->delete("/{id}", "UserController@destroy");

    });

    $router->group(['prefix' => "/clinic"], function () use ($router){
        $router->get("/", "ClinicController@getAll");
        $router->get("/{id}", "ClinicController@get");
        $router->post("/", "ClinicController@store");
        $router->put("/join/{id}", "ProfessionalController@joinClinic");
        $router->put("/delete/{id}", "ProfessionalController@deleteClinic");
        $router->put("/{id}", "ClinicController@update");
        $router->delete("/{id}", "ClinicController@destroy");
        $router->get("/schedule/{id}", "ScheduleController@getScheduleClinic");
    });


    $router->group(['prefix' => "/schedule"], function () use ($router){
        $router->get("/", "ScheduleController@getAll");
        $router->get("/{id}", "ScheduleController@get");

        //Configurações da agenda
        $router->get("/config/{id}", "ScheduleConfigController@get");
        $router->post("/config/", "ScheduleConfigController@store");
        $router->put("/config/{id}", "ScheduleConfigController@update");
        $router->delete("/config/{id}", "ScheduleConfigController@destroy");
    });

    $router->group(['prefix' => "/professional"], function () use ($router){
        $router->get("/", "ProfessionalController@getAll");
        $router->get("/{id}", "ProfessionalController@get");
        $router->post("/", "ProfessionalController@store");
        $router->put("/{id}", "ProfessionalController@update");
        $router->delete("/{id}", "ProfessionalController@destroy");

        $router->get("/patients/{id}", "ProfessionalController@getMyPatients");
        $router->post("/addPatient/{id}", "PatientController@addProfessional");
        $router->post("/dellPatient/{id}", "PatientController@dellProfessional");
        $router->get("/schedule/{id}", "ScheduleController@getScheduleProfessional");
        $router->get("/schedule/config/{id}", "ScheduleConfigController@getConfigProfessional");
    });

    $router->group(['prefix' => "/patient"], function () use ($router){
        $router->get("/", "PatientController@getAll");
        $router->get("/{id}", "PatientController@get");
        $router->post("/", "PatientController@store");
        $router->put("/{id}", "PatientController@update");
        $router->delete("/{id}", "PatientController@destroy");
        $router->get("/schedule/{id}", "ScheduleController@getSchedulePatient");
    });

    $router->group(['prefix' => "/historic"], function () use ($router){
        $router->get("/all/{id_patient}", "HistoricController@getAll");
        $router->get("/{id}", "HistoricController@get");
        $router->post("/", "HistoricController@store");
        $router->put("/{id}", "HistoricController@update");
        $router->delete("/{id}", "HistoricController@destroy");
    });

    $router->group(['prefix' => "/mood"], function () use ($router){
        $router->get("/{id}", "MoodController@get");
        $router->post("/", "MoodController@store");
    });

    $router->group(['prefix' => "/feedBack"], function () use ($router){
        $router->get("/{id}", "FeedBackController@get");
        $router->post("/", "FeedBackController@store");
        $router->get("/rating/{id}", "FeedBackController@rating");
    });

    $router->group(['prefix' => "/responsible"], function () use ($router){
        $router->get("/{id}", "ResponsibleController@get");
        $router->post("/", "ResponsibleController@store");
        $router->put("/{id}", "ResponsibleController@update");
        $router->delete("/{id}", "ResponsibleController@destroy");
    });

});


