USE PlannerData;

DROP TABLE IF EXISTS BudgetIncome;


CREATE TABLE BudgetIncome (
  BudgetIncomeID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetNumber VARCHAR(100)
  ,IncomeTypeID INT(10)
  ,IncomeType VARCHAR(100)
  ,PayCycleID INT(10)
  ,PayCycle VARCHAR(100)
  ,Salary DECIMAL(10, 4)
  ,YearDeduct DECIMAL(10, 4)
  ,HourlyRate DECIMAL(10, 4)
  ,TakeHomePay DECIMAL(10, 4)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetIncomeID`)
);


select * from BudgetIncome;