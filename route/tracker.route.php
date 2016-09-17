<?php

$app->get('/tracker', function ($request, $response, $args) {
    $response->write("Welcome to tracker!");
    return $response;
});

$app->get('/tracker/type', function ($request, $response, $args) {
    $response->write("Getting all tracker types..");
    return $response;
});
