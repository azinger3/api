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



$app->get('/budget/fund/spotlight', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetFundSpotlightGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/summary/spotlight', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetSummarySpotlightGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/summary', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $budgetMonth = $queryString['BudgetMonth'];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetSummaryGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/average', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $startDT = $queryString['StartDT'];
  $endDT = $queryString['EndDT'];

  $BudgetData = new BudgetData();
  $BudgetData->StartDT = $startDT;
  $BudgetData->EndDT = $endDT;
  $result = $BudgetData->BudgetAverageGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/breakdown', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $startDT = $queryString['StartDT'];
  $endDT = $queryString['EndDT'];

  $BudgetData = new BudgetData();
  $BudgetData->StartDT = $startDT;
  $BudgetData->EndDT = $endDT;
  $result = $BudgetData->BudgetBreakdownGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/year', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetYearGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/transaction/description', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $keyword = $queryString['Keyword'];

  $BudgetData = new BudgetData();
  $BudgetData->Keyword = $keyword;
  $result = $BudgetData->TransactionDescriptionGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/transaction/recent', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->TransactionRecentGet();

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

$app->post('/budget', function ($request, $response, $args) {

  $data = $request->getParsedBody();

  $budgetMonth = $data["BudgetMonth"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetInsert();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->post('/budget/transaction', function ($request, $response, $args) {

  $data = $request->getParsedBody();

  $transactionTypeID = $data["TransactionTypeID"];
  $transactionNumber = $data["TransactionNumber"];
  $transactionDT = $data["TransactionDT"];
  $budgetCategoryID = $data["BudgetCategoryID"];
  $amount = $data["Amount"];
  $description = $data["Description"];
  $note = $data["Note"];

  $BudgetData = new BudgetData();
  $BudgetData->TransactionTypeID = $transactionTypeID;
  $BudgetData->TransactionNumber = $transactionNumber;
  $BudgetData->TransactionDT = $transactionDT;
  $BudgetData->BudgetCategoryID = $budgetCategoryID;
  $BudgetData->Amount = $amount;
  $BudgetData->Description = $description;
  $BudgetData->Note = $note;
  $result = $BudgetData->TransactionInsert();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->put('/budget/transaction/{transactionid}', function ($request, $response, $args) {

  $transactionID = $args["transactionid"];

  $data = $request->getParsedBody();

  $transactionNumber = $data["TransactionNumber"];
  $transactionDT = $data["TransactionDT"];
  $budgetID = $data["BudgetID"];
  $budgetCategoryID = $data["BudgetCategoryID"];
  $amount = $data["Amount"];
  $description = $data["Description"];
  $note = $data["Note"];

  $BudgetData = new BudgetData();
  $BudgetData->TransactionID = $transactionID;
  $BudgetData->TransactionNumber = $transactionNumber;
  $BudgetData->TransactionDT = $transactionDT;
  $BudgetData->BudgetID = $budgetID;
  $BudgetData->BudgetCategoryID = $budgetCategoryID;
  $BudgetData->Amount = $amount;
  $BudgetData->Description = $description;
  $BudgetData->Note = $note;
  $result = $BudgetData->TransactionUpdate();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->delete('/budget/transaction/{transactionid}', function ($request, $response, $args) {

  $transactionID = $args["transactionid"];

  $BudgetData = new BudgetData();
  $BudgetData->TransactionID = $transactionID;
  $result = $BudgetData->TransactionDelete();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});
