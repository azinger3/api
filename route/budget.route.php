<?php

$app->get('/budget', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/validate', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $budgetMonth = $queryString['BudgetMonth'];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetByMonthValidate();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/expense', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $budgetMonth = $queryString['BudgetMonth'];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetExpenseByMonthGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/income', function ($request, $response, $args) {

  $queryString = $request->getQueryParams();

  $budgetMonth = $queryString['BudgetMonth'];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetIncomeByMonthGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/income/{budgetincomeid}', function ($request, $response, $args) {

  $budgetIncomeID = $args["budgetincomeid"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetIncomeID = $budgetIncomeID;
  $result = $BudgetData->BudgetIncomeDetailGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/expense/{budgetitemid}', function ($request, $response, $args) {

  $budgetItemID = $args["budgetitemid"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetItemID = $budgetItemID;
  $result = $BudgetData->BudgetExpenseDetailGet();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->get('/budget/group', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetGroupGet();

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

$app->get('/budget/fund', function ($request, $response, $args) {

  $BudgetData = new BudgetData();
  $result = $BudgetData->BudgetFundGet();

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

$app->post('/budget', function ($request, $response, $args) {

  $data = $request->getParsedBody();

  $budgetMonth = $data["BudgetMonth"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetMonth = $budgetMonth;
  $result = $BudgetData->BudgetByMonthInsert();
  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);
});

$app->post('/budget/income', function ($request, $response, $args) {

  $data = $request->getParsedBody();

  $budgetNumber = $data["BudgetNumber"];
  $incomeTypeID = $data["IncomeTypeID"];
  $incomeType = $data["IncomeType"];
  $payCycleID = $data["PayCycleID"];
  $payCycle = $data["PayCycle"];
  $takeHomePay = $data["TakeHomePay"];
  $hourlyRate = $data["HourlyRate"];
  $plannedHours = $data["PlannedHours"];
  $salary = $data["Salary"];
  $yearDeduct = $data["YearDeduct"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetNumber = $budgetNumber;
  $BudgetData->IncomeTypeID = $incomeTypeID;
  $BudgetData->IncomeType = $incomeType;
  $BudgetData->PayCycleID = $payCycleID;
  $BudgetData->PayCycle = $payCycle;
  $BudgetData->TakeHomePay = $takeHomePay;
  $BudgetData->HourlyRate = $hourlyRate;
  $BudgetData->PlannedHours = $plannedHours;
  $BudgetData->Salary = $salary;
  $BudgetData->YearDeduct = $yearDeduct;
  $result = $BudgetData->BudgetIncomeInsert();

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

$app->put('/budget/income/{budgetincomeid}', function ($request, $response, $args) {

  $budgetIncomeID = $args["budgetincomeid"];

  $data = $request->getParsedBody();

  $budgetNumber = $data["BudgetNumber"];
  $incomeTypeID = $data["IncomeTypeID"];
  $incomeType = $data["IncomeType"];
  $payCycleID = $data["PayCycleID"];
  $payCycle = $data["PayCycle"];
  $takeHomePay = $data["TakeHomePay"];
  $hourlyRate = $data["HourlyRate"];
  $plannedHours = $data["PlannedHours"];
  $salary = $data["Salary"];
  $yearDeduct = $data["YearDeduct"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetIncomeID = $budgetIncomeID;
  $BudgetData->BudgetNumber = $budgetNumber;
  $BudgetData->IncomeTypeID = $incomeTypeID;
  $BudgetData->IncomeType = $incomeType;
  $BudgetData->PayCycleID = $payCycleID;
  $BudgetData->PayCycle = $payCycle;
  $BudgetData->TakeHomePay = $takeHomePay;
  $BudgetData->HourlyRate = $hourlyRate;
  $BudgetData->PlannedHours = $plannedHours;
  $BudgetData->Salary = $salary;
  $BudgetData->YearDeduct = $yearDeduct;
  $result = $BudgetData->BudgetIncomeUpdate();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->put('/budget/expense', function ($request, $response, $args) {
  
  $data = $request->getParsedBody();

  $budgetItemID = $data["BudgetItemID"];
  $budgetNumber = $data["BudgetNumber"];
  $amount = $data["Amount"];
  $budgetGroupID = $data["BudgetGroupID"];
  $budgetGroup = $data["BudgetGroup"];
  $budgetCategoryID = $data["BudgetCategoryID"];
  $budgetCategory = $data["BudgetCategory"];
  $description = $data["Description"];
  $note = $data["Note"];
  $isEssential = $data["IsEssential"];
  $hasSpotlight = $data["HasSpotlight"];
  $colorHighlight = $data["ColorHighlight"];
  $hasFundFlg = $data["HasFundFlg"];
  $fundID = $data["FundID"];
  $fundName = $data["FundName"];
  $startingBalance = $data["StartingBalance"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetItemID = $budgetItemID;
  $BudgetData->BudgetNumber = $budgetNumber;
  $BudgetData->Amount = $amount;
  $BudgetData->BudgetGroupID = $budgetGroupID;
  $BudgetData->BudgetGroup = $budgetGroup;
  $BudgetData->BudgetCategoryID = $budgetCategoryID;
  $BudgetData->BudgetCategory = $budgetCategory;
  $BudgetData->Description = $description;
  $BudgetData->Note = $note;
  $BudgetData->IsEssential = $isEssential;
  $BudgetData->HasSpotlight = $hasSpotlight;
  $BudgetData->ColorHighlight = $colorHighlight;
  $BudgetData->HasFundFlg = $hasFundFlg;
  $BudgetData->FundID = $fundID;
  $BudgetData->FundName = $fundName;
  $BudgetData->StartingBalance = $startingBalance;
  $result = $BudgetData->BudgetExpenseUpdate();

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

$app->delete('/budget/{budgetnumber}', function ($request, $response, $args) {

  $budgetNumber = $args["budgetnumber"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetNumber = $budgetNumber;
  $result = $BudgetData->BudgetByMonthDelete();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->delete('/budget/income/{budgetincomeid}', function ($request, $response, $args) {

  $budgetIncomeID = $args["budgetincomeid"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetIncomeID = $budgetIncomeID;
  $result = $BudgetData->BudgetIncomeDelete();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});

$app->delete('/budget/expense/{budgetitemid}', function ($request, $response, $args) {

  $budgetItemID = $args["budgetitemid"];

  $BudgetData = new BudgetData();
  $BudgetData->BudgetItemID = $budgetItemID;
  $result = $BudgetData->BudgetExpenseDelete();

  header("Content-Type: application/json");
  return json_encode($result, JSON_PRETTY_PRINT);

});
