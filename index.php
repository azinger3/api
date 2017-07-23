<?php

require_once('config/app.config.php');

require 'vendor/autoload.php';

$app = new Slim\App();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
});

require 'route/index.route.php';
require 'route/budget.route.php';
require 'route/todo.route.php';
require 'route/tracker.route.php';
require 'route/wish.route.php';
require 'route/log.route.php';

$app->run();