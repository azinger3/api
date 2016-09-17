<?php

require_once('config/app.config.php');

require 'vendor/autoload.php';

$app = new Slim\App();

require 'route/index.route.php';
require 'route/budget.route.php';
require 'route/todo.route.php';
require 'route/tracker.route.php';
require 'route/wish.route.php';

$app->run();
