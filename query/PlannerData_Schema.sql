USE PlannerData;

DROP TABLE IF EXISTS BudgetGroup;
DROP TABLE IF EXISTS BudgetCategory;
DROP TABLE IF EXISTS BudgetType;
DROP TABLE IF EXISTS BudgetItem;
DROP TABLE IF EXISTS Budget;
DROP TABLE IF EXISTS TransactionType;
DROP TABLE IF EXISTS Transaction;
DROP TABLE IF EXISTS Fund;
DROP TABLE IF EXISTS FundType;
DROP TABLE IF EXISTS Todo;
DROP TABLE IF EXISTS Wish;
DROP TABLE IF EXISTS Tracker;
DROP TABLE IF EXISTS TrackerType;
DROP TABLE IF EXISTS tmpTransactionSummary;
DROP TABLE IF EXISTS tmpBudgetCategorySpotlight;
DROP TABLE IF EXISTS tmpBudgetFundSpotlight;



CREATE TABLE BudgetGroup (
  BudgetGroupID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetGroup VARCHAR(100)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetGroupID`)
);

CREATE TABLE BudgetCategory (
  BudgetCategoryID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetGroupID INT(10)
  ,FundID INT(10)
  ,BudgetCategory VARCHAR(100)
  ,Description VARCHAR(1000)
  ,Note VARCHAR(1000)
  ,IsEssential INT(1)
  ,HasSpotlight INT(1)
  ,ColorHighlight VARCHAR(100)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetCategoryID`)
);

CREATE TABLE BudgetType (
  BudgetTypeID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetType VARCHAR(100)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetTypeID`)
);

CREATE TABLE BudgetItem (
  BudgetItemID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetID INT(10)
  ,BudgetCategoryID INT(10)
  ,BudgetTypeID INT(10)
  ,Amount DECIMAL(10, 4)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetItemID`)
);

CREATE TABLE Budget (
  BudgetID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetNumber VARCHAR(100)
  ,BudgetMonth DATETIME
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetID`)
);

CREATE TABLE TransactionType (
  TransactionTypeID INT(10) NOT NULL AUTO_INCREMENT
  ,TransactionType VARCHAR(100)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`TransactionTypeID`)
);

CREATE TABLE Transaction (
  TransactionID INT(10) NOT NULL AUTO_INCREMENT
  ,TransactionTypeID INT(10)
  ,TransactionNumber VARCHAR(100)
  ,TransactionDT DATETIME
  ,BudgetID INT(10)
  ,BudgetCategoryID INT(10)
  ,Amount DECIMAL(10, 4)
  ,Description VARCHAR(1000)
  ,Note VARCHAR(1000)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`TransactionID`)
);

CREATE TABLE Fund (
  FundID INT(10) NOT NULL AUTO_INCREMENT
  ,FundTypeID INT(10)
  ,FundName VARCHAR(100)
  ,StartingBalance DECIMAL(10, 4)
  ,Note VARCHAR(1000)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`FundID`)
);

CREATE TABLE FundType (
  FundTypeID INT(10) NOT NULL AUTO_INCREMENT
  ,FundType VARCHAR(100)
  ,Note VARCHAR(1000)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`FundTypeID`)
);

CREATE TABLE Todo (
  TodoID INT(10) NOT NULL AUTO_INCREMENT
  ,TaskName VARCHAR(100)
  ,Note VARCHAR(100)
  ,IsComplete INT(1) DEFAULT 0
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`TodoID`)
);

CREATE TABLE Wish (
  WishID INT(10) NOT NULL AUTO_INCREMENT
  ,WishItem VARCHAR(100)
  ,EstimatedCost DECIMAL(10, 4)
  ,Why VARCHAR(1000)
  ,WhyNot VARCHAR(1000)
  ,Priority INT(1)
  ,Goal VARCHAR(100)
  ,IsComplete INT(1) DEFAULT 0
  ,Note VARCHAR(1000)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`WishID`)
);

CREATE TABLE Tracker (
  TrackerID INT(10) NOT NULL AUTO_INCREMENT
  ,TrackerTypeID INT(10)
  ,TrackerName VARCHAR(100)
  ,Amount DECIMAL(10, 4)
  ,AsOfDT DATETIME
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`TrackerID`)
);

CREATE TABLE TrackerType (
  TrackerTypeID INT(10) NOT NULL AUTO_INCREMENT
  ,TrackerType VARCHAR(100)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`TrackerTypeID`)
);

CREATE TABLE tmpTransactionSummary
(
  KeyID								INT(10) NOT NULL AUTO_INCREMENT
  ,SessionID							VARCHAR(100)
  ,TransactionID						INT(10)
  ,TransactionDT						DATETIME
  ,TransactionTypeID					INT(10)
  ,TransactionType					VARCHAR(100)
  ,TransactionNumber					VARCHAR(100)
  ,Description						VARCHAR(1000)
  ,Amount								DECIMAL(10, 2)
  ,Note								VARCHAR(1000)
  ,BudgetID							INT(10)
  ,BudgetGroupID						INT(10)
  ,BudgetGroup						VARCHAR(100)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,HasSpotlight 						INT(1)
  ,Sort 								INT(3)
  ,CategoryActual						DECIMAL(10, 2)
  ,CategoryBudget						DECIMAL(10, 2)
  ,CategoryActualVsBudget				DECIMAL(10, 2)
  ,CategoryAverage					DECIMAL(10, 2)
  ,IncomeActual						DECIMAL(10, 2)
  ,IncomeBudget						DECIMAL(10, 2)
  ,IncomeActualVsBudget				DECIMAL(10, 2)
  ,IncomeAverage						DECIMAL(10, 2)
  ,ExpenseActual						DECIMAL(10, 2)
  ,ExpenseBudget						DECIMAL(10, 2)
  ,ExpenseActualVsBudget				DECIMAL(10, 2)
  ,ExpenseAverage						DECIMAL(10, 2)
  ,TotalIncomeVsExpenseActual			DECIMAL(10, 2)
  ,TotalIncomeVsExpenseBudget			DECIMAL(10, 2)
  ,TotalIncomeVsExpenseActualVsBudget	DECIMAL(10, 2)
  ,TotalIncomeVsExpenseAverage		DECIMAL(10, 2)
  ,PRIMARY KEY (`KeyID`)
);

CREATE TABLE tmpBudgetCategorySpotlight
(
  KeyID								INT(10) NOT NULL AUTO_INCREMENT
  ,SessionID							VARCHAR(100)
  ,BudgetID INT(10)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,Sort INT(3)
  ,CategoryActual						DECIMAL(10, 2)
  ,CategoryBudget						DECIMAL(10, 2)
  ,CategoryActualVsBudget				DECIMAL(10, 2)
  ,TotalCategoryActualVsBudget  DECIMAL(10, 2)
  ,PRIMARY KEY (`KeyID`)
);

CREATE TABLE tmpBudgetFundSpotlight
(
  KeyID								INT(10) NOT NULL AUTO_INCREMENT
  ,SessionID							VARCHAR(100)
  ,BudgetID INT(10)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,Sort INT(3)
  ,FundID INT(10)
  ,FundName VARCHAR(100)
  ,StartingBalance						DECIMAL(10, 2)
  ,FundSpent						DECIMAL(10, 2)
  ,FundReceived						DECIMAL(10, 2)
  ,FundReceivedPlusStartingBalance						DECIMAL(10, 2)
  ,FundSpentVsReceived					DECIMAL(10, 2)
  ,PRIMARY KEY (`KeyID`)
);


INSERT INTO BudgetType
(BudgetType, CreateDT)
VALUES
('Receiving', NOW())
,('Spending', NOW())
;

INSERT INTO TransactionType
(TransactionType, CreateDT)
VALUES
('Received', NOW())
,('Spent', NOW())
;

INSERT INTO FundType
(FundType, Note, CreateDT)
VALUES
('Savings', 'Savings fund', NOW())
;

INSERT INTO BudgetGroup
(BudgetGroup, CreateDT)
VALUES
('Strategic',NOW())
,('Housing',NOW())
,('Utilities',NOW())
,('Health',NOW())
,('Transportation',NOW())
,('Personal',NOW())
,('Debt',NOW())
,('Income',NOW())
;

INSERT INTO Fund
(FundTypeID, FundName, StartingBalance, Note, CreateDT)
VALUES
(1,'Emergency Fund',123.4567,'Saving for emergencies',NOW())
,(1,'Car Replacement Fund',123.4567,'Saving to replace cars',NOW())
,(1,'Travel Fund',123.4567,'Saving for trips',NOW())
,(1,'Christmas Fund',123.4567,'Saving for christmas gifts',NOW())
,(1,'Gifts Fund',123.4567,'Saving for all other gifts',NOW())
;

INSERT INTO BudgetCategory
(BudgetGroupID, FundID, BudgetCategory, Description, Note, IsEssential, HasSpotlight, ColorHighlight, CreateDT)
VALUES
(1, NULL, 'Giving', NULL, 'Pay bi-weekly', 0, 0, 'Red', NOW())
,(1, NULL, 'Vanguard IRA', NULL, 'Autopayed bi-weekly', 0, 0, 'Red', NOW())
,(1, 1, 'Emergencies', NULL, 'Savings fund, Autopayed bi-weekly', 0, 1, 'Red', NOW())
,(1, 2, 'Car Replacement', NULL, 'Savings fund, Autopayed bi-weekly', 0, 1, 'Red', NOW())
,(1, 3, 'Travel', NULL, 'Savings fund, Autopayed bi-weekly', 0, 1, 'Red', NOW())
,(1, 4, 'Christmas', NULL, 'Savings fund, Autopayed bi-weekly', 0, 1, 'Red', NOW())
,(2, NULL, 'Mortgage', NULL, 'Pay on 1st', 1, 0, 'Red', NOW())
,(2, NULL, 'Home Owners Fee', NULL, 'Pay on 1st', 1, 0, 'Red', NOW())
,(2, NULL, 'Home Insurance', NULL, 'Autopayed on 5th', 1, 0, 'Red', NOW())
,(3, NULL, 'LG&E', NULL, 'Pay on 25th', 1, 0, 'Red', NOW())
,(3, NULL, 'Phone Cell', NULL, 'Pay on 1st', 1, 0, 'Red', NOW())
,(3, NULL, 'Internet', NULL, 'Pay on 1st', 0, 0, 'Red', NOW())
,(3, NULL, 'Hulu Plus', NULL, 'Autopayed on 15th', 0, 0, 'Red', NOW())
,(3, NULL, 'Netflix', NULL, 'Autopayed on 23rd', 0, 0, 'Red', NOW())
,(4, NULL, 'Medical', NULL, '-', 0, 0, 'Red', NOW())
,(4, NULL, 'Grocery', NULL, 'Variable expense, A guideline', 1, 1, 'Red', NOW())
,(5, NULL, 'Gas', NULL, 'Variable expense, A guideline', 1, 1, 'Red', NOW())
,(5, NULL, 'Car Insurance', NULL, 'Autopayed on 5th', 1, 0, 'Red', NOW())
,(5, NULL, 'AAA', NULL, 'Yearly on April 15th (Autopayed)', 0, 0, 'Red', NOW())
,(5, NULL, 'Car Registration', NULL, 'Yearly on March 25th', 1, 0, 'Red', NOW())
,(6, NULL, 'Needs', 'Examples include clothes, hygiene, toiletries, home care, cleaning supplies, yard care, pet expenses, school supplies, office supplies, shipping, legal fees, and legal services','Variable expense, A guideline', 1, 1, 'Red', NOW())
,(6, NULL, 'Wants', 'Examples include nice-to-haves, events, outings, special purchases, projects, fun, breakfast, lunch, and snacks','Variable expense, A guideline', 0, 1, 'Red', NOW())
,(6, NULL, 'Gifts', NULL, 'Variable expense, A guideline', 0, 1, 'Red', NOW())
,(6, NULL, 'Eat Out', 'Examples include dinner and desert', 'Variable expense, A guideline', 0, 1, 'Red', NOW())
,(6, NULL, 'WAM', NULL, 'Cash Withdrawal bi-weekly', 1, 1, 'Red', NOW())
,(7, NULL, 'Credit Cards', NULL, '-', 0, 0, 'Red', NOW())
,(7, NULL, 'FedLoan', NULL, 'Pay on 25th', 0, 0, 'Red', NOW())
,(7, NULL, 'AES', NULL, '-', 0, 0, 'Red', NOW())
,(8, NULL, 'Atria', NULL, 'Received Bi-weekly', 0, 0, 'Blue', NOW())
,(8, NULL, 'Vertis', NULL, 'Received Bi-weekly', 0, 0, 'Blue', NOW())
;

INSERT INTO Budget
(BudgetNumber, BudgetMonth, CreateDT)
VALUES
(201607, '2016-07-01', NOW())
,(201608, '2016-08-01', NOW())
,(201609, '2016-09-01', NOW())
;

INSERT INTO BudgetItem
(BudgetID, BudgetCategoryID, BudgetTypeID, Amount, CreateDT)
VALUES
(1, 29, 1, 4403.00, NOW())
,(1, 30, 1, 1864.00, NOW())
,(1, 1, 2, 617.00, NOW())
,(1, 2, 2, 86.00, NOW())
,(1, 3, 2, 0.00, NOW())
,(1, 4, 2, 0.00, NOW())
,(1, 5, 2, 207.00, NOW())
,(1, 6, 2, 0.00, NOW())
,(1, 7, 2, 712.00, NOW())
,(1, 8, 2, 131.00, NOW())
,(1, 9, 2, 24.00, NOW())
,(1, 10, 2, 90.00, NOW())
,(1, 11, 2, 220.00, NOW())
,(1, 12, 2, 70.00, NOW())
,(1, 13, 2, 8.00, NOW())
,(1, 14, 2, 10.00, NOW())
,(1, 15, 2, 0.00, NOW())
,(1, 16, 2, 300.00, NOW())
,(1, 17, 2, 250.00, NOW())
,(1, 18, 2, 136.00, NOW())
,(1, 19, 2, 10.00, NOW())
,(1, 20, 2, 15.00, NOW())
,(1, 21, 2, 390.00, NOW())
,(1, 22, 2, 220.00, NOW())
,(1, 23, 2, 100.00, NOW())
,(1, 24, 2, 250.00, NOW())
,(1, 25, 2, 174.00, NOW())
,(1, 26, 2, 0.00, NOW())
,(1, 27, 2, 1097.00, NOW())
,(1, 28, 2, 0.00, NOW())
,(2, 29, 1, 4403.00, NOW())
,(2, 30, 1, 2821.00, NOW())
,(2, 1, 2, 723.00, NOW())
,(2, 2, 2, 84.00, NOW())
,(2, 3, 2, 0.00, NOW())
,(2, 4, 2, 0.00, NOW())
,(2, 5, 2, 0.00, NOW())
,(2, 6, 2, 0.00, NOW())
,(2, 7, 2, 712.00, NOW())
,(2, 8, 2, 131.00, NOW())
,(2, 9, 2, 24.00, NOW())
,(2, 10, 2, 90.00, NOW())
,(2, 11, 2, 220.00, NOW())
,(2, 12, 2, 70.00, NOW())
,(2, 13, 2, 8.00, NOW())
,(2, 14, 2, 10.00, NOW())
,(2, 15, 2, 0.00, NOW())
,(2, 16, 2, 320.00, NOW())
,(2, 17, 2, 250.00, NOW())
,(2, 18, 2, 136.00, NOW())
,(2, 19, 2, 10.00, NOW())
,(2, 20, 2, 15.00, NOW())
,(2, 21, 2, 360.00, NOW())
,(2, 22, 2, 320.00, NOW())
,(2, 23, 2, 225.00, NOW())
,(2, 24, 2, 250.00, NOW())
,(2, 25, 2, 174.00, NOW())
,(2, 26, 2, 0.00, NOW())
,(2, 27, 2, 3090.00, NOW())
,(2, 28, 2, 0.00, NOW())
,(3, 29, 1, 2032.00, NOW())
,(3, 30, 1, 1302.00, NOW())
,(3, 1, 2, 723.00, NOW())
,(3, 2, 2, 86.00, NOW())
,(3, 3, 2, 0.00, NOW())
,(3, 4, 2, 0.00, NOW())
,(3, 5, 2, 0.00, NOW())
,(3, 6, 2, 0.00, NOW())
,(3, 7, 2, 712.00, NOW())
,(3, 8, 2, 131.00, NOW())
,(3, 9, 2, 24.00, NOW())
,(3, 10, 2, 90.00, NOW())
,(3, 11, 2, 220.00, NOW())
,(3, 12, 2, 70.00, NOW())
,(3, 13, 2, 8.00, NOW())
,(3, 14, 2, 10.00, NOW())
,(3, 15, 2, 0.00, NOW())
,(3, 16, 2, 320.00, NOW())
,(3, 17, 2, 250.00, NOW())
,(3, 18, 2, 136.00, NOW())
,(3, 19, 2, 10.00, NOW())
,(3, 20, 2, 15.00, NOW())
,(3, 21, 2, 360.00, NOW())
,(3, 22, 2, 320.00, NOW())
,(3, 23, 2, 225.00, NOW())
,(3, 24, 2, 250.00, NOW())
,(3, 25, 2, 174.00, NOW())
,(3, 26, 2, 0.00, NOW())
,(3, 27, 2, 3090.00, NOW())
,(3, 28, 2, 0.00, NOW())
;

INSERT INTO Transaction
(TransactionTypeID, TransactionNumber, TransactionDT, BudgetID, BudgetCategoryID, Amount, Description, Note, CreateDT)
VALUES
(1, 'ATR-2016-07-1', '2016-07-08', 1, 29, 2032.00, 'Atria Paycheck', NULL, NOW())
,(1, 'VER-2016-07-1', '2016-07-12', 1, 30, 980.70, 'Vertis Paycheck', '50.95 Hours', NOW())
,(2, NULL, '2016-07-05', 1, 18, 136.00, 'Car Insurance', NULL, NOW())
,(2, NULL, '2016-07-18', 1, 21, 8.90, 'Office Supplies', NULL, NOW())
,(2, NULL, '2016-07-19', 1, 21, 22.25, 'Cat - Feeders Supply', NULL, NOW())
,(2, NULL, '2016-07-19', 1, 21, 999.999, 'Cat - Feeders Supply', NULL, NOW())
,(2, NULL, '2016-07-05', 1, 22, 39.90, 'Etsy', NULL, NOW())
,(2, NULL, '2016-07-07', 1, 21, 25.33, 'Urban Outfitters', NULL, NOW())
,(2, NULL, '2016-07-25', 1, 22, 47.71, 'Lunch', NULL, NOW())
,(1, 'ATR-2016-08-1', '2016-08-08', 2, 29, 2032.00, 'Atria Paycheck', NULL, NOW())
,(1, 'VER-2016-08-1', '2016-08-12', 2, 30, 980.70, 'Vertis Paycheck', '78.32 Hours', NOW())
,(2, NULL, '2016-08-05', 2, 18, 136.00, 'Car Insurance', NULL, NOW())
,(2, NULL, '2016-08-18', 2, 21, 81.90, 'At Home Store', NULL, NOW())
,(2, NULL, '2016-08-19', 2, 21, 61.25, 'Oil Change', NULL, NOW())
,(2, NULL, '2016-08-05', 2, 22, 10.62, 'Pub', NULL, NOW())
,(2, NULL, '2016-08-07', 2, 22, 21.45, 'Movies', NULL, NOW())
,(2, NULL, '2016-08-25', 2, 22, 47.71, 'Lunch', NULL, NOW())
,(1, 'ATR-2016-09-1', '2016-09-02', 3, 29, 2074.00, 'Atria Paycheck', NULL, NOW())
,(1, 'VER-2016-09-1', '2016-09-14', 3, 30, 1200.70, 'Vertis Paycheck', '78.32 Hours', NOW())
,(2, NULL, '2016-09-03', 3, 18, 148.00, 'Car Insurance', NULL, NOW())
,(2, NULL, '2016-09-01', 3, 21, 12.90, 'At Home Store', NULL, NOW())
,(2, NULL, '2016-09-30', 3, 21, 67.25, 'Oil Change', NULL, NOW())
,(2, NULL, '2016-09-30', 3, 22, 24.62, 'Pub', NULL, NOW())
,(2, NULL, '2016-09-16', 3, 22, 12.45, 'Movies', NULL, NOW())
,(2, NULL, '2016-09-14', 3, 22, 54.98, 'Lunch', NULL, NOW())
,(1, NULL, '2016-09-01', 3, 3, 2074.00, 'save', NULL, NOW())
,(1, NULL, '2016-09-30', 3, 4, 1200.70, 'saved', NULL, NOW())
,(1, NULL, '2016-09-02', 3, 3, 50.00, 'save', NULL, NOW())
,(1, NULL, '2016-09-25', 3, 4, 50.01, 'saved', NULL, NOW())
,(2, NULL, '2016-09-03', 3, 4, 148.00, 'Save spend 1', NULL, NOW())
,(2, NULL, '2016-09-01', 3, 5, 12.90, 'Save spend 2', NULL, NOW())
,(2, NULL, '2016-09-30', 3, 5, 67.25, 'Save spend 3', NULL, NOW())
,(2, NULL, '2016-09-30', 3, 3, 24.62, 'Save spend 4', NULL, NOW())
,(2, NULL, '2016-09-16', 3, 3, 12.45, 'Save spend 5', NULL, NOW())
,(2, NULL, '2016-09-14', 3, 6, 54.98, 'Save spend 6', NULL, NOW())
;

INSERT INTO Todo
(TaskName, Note, IsComplete)
VALUES
('Start Educational Savings Account (ESA)/529', NULL, 0)
,('Research term-life insurance', NULL, 1)
,('Save for house', NULL, 0)
;

INSERT INTO Wish
(WishItem, EstimatedCost, Why, WhyNot, Priority, Goal, Note, IsComplete, CreateDT)
VALUES
('Clean Carpet', 250.00, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Replace Carpet', 4000.00, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Renovate Guest Bath', 1500.00, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Install Crown Molding', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Replace Kitchen Flooring', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Renovate Guestroom', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Next Car Savings', 15000.00, NULL, NULL, NULL, NULL, 'In progress...', 0, NOW())
,('New TV/Storage Unit', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Yearly Christmas Savings', 1500.00, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('Germany Vacation', 4000.00, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('India Mission Trip', 2700.00, NULL, NULL, NULL, NULL, NULL, 1, NOW())
,('Cookson Hills Mission Trip', 1000.00, NULL, NULL, NULL, NULL, NULL, 1, NOW())
,('New Living Room Tables', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('New Kitchen Furniture', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
,('New Desktop Computer', NULL, NULL, NULL, NULL, NULL, NULL, 0, NOW())
;

INSERT INTO TrackerType
(TrackerType, CreateDT)
VALUES
('Retirement',NOW())
,('Debt',NOW())
;

INSERT INTO Tracker
(TrackerTypeID, TrackerName ,Amount ,AsOfDT, CreateDT)
VALUES
(1, 'Vangaurd IRA', 62471.00, '2016-07-27', NOW())
,(1, 'Atria 401(k)', 2373.00, '2016-07-27', NOW())
,(2, 'FedLoan', 7202.00, '2016-07-27', NOW())
,(2, 'AES', 13910.00, '2016-07-27', NOW())
;
