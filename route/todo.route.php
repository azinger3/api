<?php

$app->get('/todo', function ($request, $response, $args) {
    $response->write("Welcome to todo!");
    return $response;
});
