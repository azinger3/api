USE PlannerData;

DROP TABLE IF EXISTS BudgetGroup;

DROP TABLE IF EXISTS BudgetType;
DROP TABLE IF EXISTS BudgetItem;
DROP TABLE IF EXISTS Budget;

-- DROP TABLE IF EXISTS Transaction;
DROP TABLE IF EXISTS Todo;
DROP TABLE IF EXISTS Wish;
DROP TABLE IF EXISTS Tracker;
DROP TABLE IF EXISTS TrackerType;





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

DROP TABLE IF EXISTS BudgetCategory;

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
,(8, NULL, 'Income', NULL, 'Sources of income', 0, 0, 'Blue', NOW())
,(1, NULL, 'Career', NULL, 'Savings fund, Pay monthly', 0, 0, 'Blue', NOW())
,(1, 5, 'School', NULL, 'Savings fund, Pay monthly', 0, 1, 'Blue', NOW())
,(1, NULL, 'World Vision', NULL, '', 0, 0, 'Blue', NOW())
;

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
  ,BudgetNumber VARCHAR(100)
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

DROP TABLE IF EXISTS TransactionType;

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

INSERT INTO TransactionType
(TransactionType, CreateDT)
VALUES
('Income', NOW())
,('Expense', NOW())
,('Saved', NOW())
,('Spent', NOW())
;

-- CREATE TABLE Transaction (
--   TransactionID INT(10) NOT NULL AUTO_INCREMENT
--   ,TransactionTypeID INT(10)
--   ,TransactionNumber VARCHAR(100)
--   ,TransactionDT DATETIME
--   ,BudgetNumber VARCHAR(100)
--   ,BudgetCategoryID INT(10)
--   ,Amount DECIMAL(10, 4)
--   ,Description VARCHAR(1000)
--   ,Note VARCHAR(1000)
--   ,CreateDT DATETIME
--   ,CreateBy VARCHAR(100)
--   ,ModifyDT DATETIME
--   ,ModifyBy VARCHAR(100)
--   ,ActiveFlg INT(1) DEFAULT 1
--   ,PRIMARY KEY (`TransactionID`)
-- );

DROP TABLE IF EXISTS Fund;
DROP TABLE IF EXISTS FundType;

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

INSERT INTO FundType
(FundType, Note, CreateDT)
VALUES
('Savings', 'Savings fund', NOW())
;

INSERT INTO Fund
(FundTypeID, FundName, StartingBalance, Note, CreateDT)
VALUES
(1,'Emergency Fund',9247.89,'Saving for emergencies',NOW())
,(1,'Car Replacement Fund',0,'Saving to replace cars',NOW())
,(1,'Travel Fund',98.93,'Saving for trips',NOW())
,(1,'Christmas Fund',81.10,'Saving for christmas gifts',NOW())
,(1,'School Fund',0,'Saving for school',NOW())
;

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


DROP TABLE IF EXISTS tmpBudgetSummary;

CREATE TABLE tmpBudgetSummary
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
  ,BudgetNumber							VARCHAR(100)
  ,BudgetTypeID						INT(10)
  ,BudgetGroupID						INT(10)
  ,BudgetGroup						VARCHAR(100)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,Sort 								INT(3)
  ,CategoryActual						DECIMAL(10, 2)
  ,CategoryBudget						DECIMAL(10, 2)
  ,CategoryActualVsBudget				DECIMAL(10, 2)
  ,IncomeActual						DECIMAL(10, 2)
  ,IncomeBudget						DECIMAL(10, 2)
  ,IncomeActualVsBudget				DECIMAL(10, 2)
  ,ExpenseActual						DECIMAL(10, 2)
  ,ExpenseBudget						DECIMAL(10, 2)
  ,ExpenseActualVsBudget				DECIMAL(10, 2)
  ,TotalIncomeVsExpenseActual			DECIMAL(10, 2)
  ,TotalIncomeVsExpenseBudget			DECIMAL(10, 2)
  ,TotalIncomeVsExpenseActualVsBudget	DECIMAL(10, 2)
  ,IsCategoryActualVsBudgetNegative INT(1) NULL
  ,IsTotalIncomeVsExpenseActualNegative INT(1) NULL
  ,IsTotalIncomeVsExpenseBudgetNegative INT(1) NULL
  ,IsTotalIncomeVsExpenseActualVsBudgetNegative INT(1) NULL
  ,IsExpenseFlg INT(1) NULL
  ,PRIMARY KEY (`KeyID`)
);


DROP TABLE IF EXISTS tmpBudgetAverage;

CREATE TABLE tmpBudgetAverage
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
  ,BudgetNumber							VARCHAR(100)
  ,BudgetTypeID						INT(10)
  ,BudgetGroupID						INT(10)
  ,BudgetGroup						VARCHAR(100)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,Sort 								INT(3)
  ,CategoryActual						DECIMAL(10, 2)
  ,CategoryAverage						DECIMAL(10, 2)
  ,IncomeActual						DECIMAL(10, 2)
  ,IncomeAverage						DECIMAL(10, 2)
  ,ExpenseActual						DECIMAL(10, 2)
  ,ExpenseAverage						DECIMAL(10, 2)
  ,TotalIncomeVsExpenseActual			DECIMAL(10, 2)
  ,TotalIncomeVsExpenseAverage			DECIMAL(10, 2)
  ,IsTotalIncomeVsExpenseActualNegative INT(1) NULL
  ,IsTotalIncomeVsExpenseAverageNegative INT(1) NULL
  ,IsExpenseFlg INT(1) NULL
  ,PRIMARY KEY (`KeyID`)
);


DROP TABLE IF EXISTS tmpBudgetCategorySpotlight;

CREATE TABLE tmpBudgetCategorySpotlight
(
  KeyID								INT(10) NOT NULL AUTO_INCREMENT
  ,SessionID							VARCHAR(100)
  ,BudgetMonth DATETIME
  ,BudgetNumber VARCHAR(100)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,Sort INT(3)
  ,CategoryActual						DECIMAL(10, 2)
  ,CategoryBudget						DECIMAL(10, 2)
  ,CategoryActualVsBudget				DECIMAL(10, 2)
  ,CategoryPercentageSpent	DECIMAL(10, 0)
  ,CategoryProgressBarStyle	VARCHAR(100)
  ,IsCategoryNegativeFlg	INT(1) NULL
  ,TotalCategoryActual						DECIMAL(10, 2)
  ,TotalCategoryBudget						DECIMAL(10, 2)
  ,TotalCategoryActualVsBudget				DECIMAL(10, 2)
  ,TotalCategoryPercentageSpent	DECIMAL(10, 0)
  ,TotalCategoryProgressBarStyle	VARCHAR(100)
  ,IsTotalCategoryNegativeFlg	INT(1) NULL
  ,PRIMARY KEY (`KeyID`)
);


DROP TABLE IF EXISTS tmpBudgetFundSpotlight;

CREATE TABLE tmpBudgetFundSpotlight
(
  KeyID								INT(10) NOT NULL AUTO_INCREMENT
  ,SessionID							VARCHAR(100)
  ,FundID INT(10)
  ,FundName VARCHAR(100)
  ,BudgetCategoryID					INT(10)
  ,BudgetCategory						VARCHAR(100)
  ,Sort INT(3)
  ,StartingBalance						DECIMAL(10, 2)
  ,FundSpent						DECIMAL(10, 2)
  ,FundReceived						DECIMAL(10, 2)
  ,FundReceivedPlusStartingBalance						DECIMAL(10, 2)
  ,FundSpentVsReceived					DECIMAL(10, 2)
  ,TotalFundSpentVsReceived					DECIMAL(10, 2)
  ,PRIMARY KEY (`KeyID`)
);


INSERT INTO BudgetType
(BudgetType, CreateDT)
VALUES
('Income', NOW())
,('Expense', NOW())
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
