USE PlannerData;

DROP TABLE IF EXISTS BudgetIncome;
DROP TABLE IF EXISTS IncomeType;
DROP TABLE IF EXISTS IncomePayCycle;


CREATE TABLE BudgetIncome (
  BudgetIncomeID INT(10) NOT NULL AUTO_INCREMENT
  ,BudgetNumber VARCHAR(100)
  ,IncomeTypeID INT(10)
  ,IncomePayCycleID INT(10)
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

CREATE TABLE IncomeType (
  IncomeTypeID INT(10) NOT NULL AUTO_INCREMENT
  ,IncomeType	VARCHAR(100)
  ,Description VARCHAR(1000)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`IncomeTypeID`)
);

CREATE TABLE IncomePayCycle (
  IncomePayCycleID INT(10) NOT NULL AUTO_INCREMENT
  ,PayCycle	VARCHAR(100)
  ,Description VARCHAR(1000)
  ,Sort INT(3)
  ,CreateDT DATETIME
  ,CreateBy VARCHAR(100)
  ,ModifyDT DATETIME
  ,ModifyBy VARCHAR(100)
  ,ActiveFlg INT(1) DEFAULT 1
  ,PRIMARY KEY (`IncomePayCycleID`)
);


insert into IncomeType
(
	IncomeType
    ,Description
    ,Sort
    ,CreateDT
    ,CreateBy
)
select	'Salary'
		,'A fixed regular payment, typically paid on a monthly or biweekly basis but often expressed as an annual sum, made by an employer to an employee, especially a professional or white-collar worker.'
        ,0
        ,NOW()
        ,'System' union
select	'Hourly'
		,'An hourly wage, as opposed to a fixed salary. Hourly workers may often be found in service and manufacturing occupations, but are common across a variety of fields.'
        ,0
        ,NOW()
        ,'System'
;
        
select * from IncomeType;


insert into IncomePayCycle
(
	PayCycle
    ,Description
    ,Sort
    ,CreateDT
    ,CreateBy
)
select	'Bi-Weekly'
		,'Every 2 Weeks'
        ,0
        ,NOW()
        ,'System' union
select	'Weekly'
		,'Every Week'
        ,0
        ,NOW()
        ,'System'
;
        
select * from IncomePayCycle;
