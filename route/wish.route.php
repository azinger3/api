<?php

$app->get('/wish', function ($request, $response, $args) {
    $response->write("Welcome to wish!");
    return $response;
});
