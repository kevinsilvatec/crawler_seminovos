<?php

$router->get('/', function () use ($router) {
    $retorno = [];
    $retorno["message"] = "This API is working!";
    return json_encode($retorno);
});

$router->post("/search", "SeminovosController@search");

$router->post("/searchad", "SeminovosController@searchAd");