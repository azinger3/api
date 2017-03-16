USE PlannerData;

DROP TABLE IF EXISTS BudgetIncome;


CREATE TABLE BudgetIncome (
  BudgetIncomeID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetNumber VARCHAR(100)
  ,IncomeName VARCHAR(100)
  ,IncomeTypeID INT(10)
  ,IncomeType VARCHAR(100)
  ,PayCycleID INT(10)
  ,PayCycle VARCHAR(100)
  ,TakeHomePay DECIMAL(10, 4)
  ,HourlyRate DECIMAL(10, 4)
  ,PlannedHours INT(10)
  ,Salary DECIMAL(10, 4)
  ,YearDeduct DECIMAL(10, 4)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`BudgetIncomeID`)
);

INSERT INTO `PlannerData`.`BudgetIncome`
(
`BudgetNumber`,
`IncomeName`,
`IncomeTypeID`,
`IncomeType`,
`PayCycleID`,
`PayCycle`,
`TakeHomePay`,
`HourlyRate`,
`PlannedHours`,
`Salary`,
`YearDeduct`,
`CreateDT`,
`CreateBy`
)
VALUES
(
'201703',
'Atria Senior Living',
1,
'Salary',
1,
'Bi-Weekly',
2186,
40.88,
40,
85035,
33.16,
NOW(),
'User'
),
(
'201703',
'Vertis Therapy',
2,
'Hourly',
1,
'Bi-Weekly',
1126,
24.00,
34,
42432,
31.00,
NOW(),
'User'
)
;

select * from BudgetIncome;