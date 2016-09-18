<?php

$app->get('/', function ($request, $response, $args) {
    $Endpoint = array(
      array("budget" => array("url" => "http://api.jordanandrobert.com/budget")),
      array("todo" => array("url" => "http://api.jordanandrobert.com/todo")),
      array("tracker" => array("url" => "http://api.jordanandrobert.com/tracker")),
      array("wish" => array("url" => "http://api.jordanandrobert.com/wish")),
    );

    $Arr = array("_endpoints" => $Endpoint);

    header("Content-Type: application/json");
    return "<pre style='word-wrap: break-word; white-space: pre-wrap;'>" . json_encode($Arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
});


$app->get('/hello[/{name}]', function ($request, $response, $args) {
    $response->write("Hello, " . $args["name"]);

    return $response;

})->setArgument('name', 'stranger!');
