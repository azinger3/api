<?php

$app->get('/budget', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/category', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetCategoryGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/category/spotlight', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetCategorySpotlightGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/transaction/description', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $Keyword = $queryString['Keyword'];

  $BudgetData = new BudgetData();
  $BudgetData->Keyword = $Keyword;
  $result = $BudgetData->TransactionDescriptionGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/transaction/summary', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $BudgetCategoryID = $queryString['BudgetCategoryID'];
  $Keyword = $queryString['Keyword'];
  $StartDT = $queryString['StartDT'];
  $EndDT = $queryString['EndDT'];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetCategoryID = $BudgetCategoryID;
  $BudgetData->Keyword = $Keyword;
  $BudgetData->StartDT = $StartDT;
  $BudgetData->EndDT = $EndDT;
  $result = $BudgetData->TransactionSummaryGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/fund/spotlight', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetFundSpotlightGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/{year}/{month}', function ($request, $response, $args) {

  $BudgetMonth = $args['year'] . "-" . $args['month'] . "-01";

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $BudgetMonth;
  $result = $BudgetData->BudgetByMonthGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});
