<?php

$app->get('/budget', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/{year}/{month}', function ($request, $response, $args) {

  $budgetMonth = $args['year'] . "-" . $args['month'] . "-01";

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetByMonthGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/category', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetCategoryGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

// $app->post('/budget', function ($request, $response) {
//
//     $data = $request->getParsedBody();
//
//     $ticket_data = [];
//     $ticket_data['title'] = filter_var($data['title'], FILTER_SANITIZE_STRING);
//     $ticket_data['description'] = filter_var($data['description'], FILTER_SANITIZE_STRING);
//
// });
