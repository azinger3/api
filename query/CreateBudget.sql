USE PlannerData;

set @BudgetMonth = '2017-02-01';

INSERT INTO Budget
(BudgetNumber, BudgetMonth, CreateDT)
VALUES
(201702, @BudgetMonth, NOW())
;
    
SET @BudgetIDNew = EXTRACT(YEAR_MONTH FROM @BudgetMonth);

INSERT INTO BudgetItem
(BudgetNumber, BudgetCategoryID, BudgetTypeID, Amount, CreateDT)
VALUES
(@BudgetIDNew, 29, 1, 7152.00, NOW()) -- Income
,(@BudgetIDNew, 1, 2, 715.00, NOW()) -- Giving
,(@BudgetIDNew, 2, 2, 86.00, NOW()) -- Vanguard Roth IRA
,(@BudgetIDNew, 3, 2, 0.00, NOW()) -- Emergencies
,(@BudgetIDNew, 4, 2, 3018.00, NOW()) -- Car Replacement
,(@BudgetIDNew, 5, 2, 0.00, NOW()) -- Travel
,(@BudgetIDNew, 6, 2, 0.00, NOW()) -- Christmas
,(@BudgetIDNew, 30, 2, 0.00, NOW()) -- Career
-- ,(@BudgetIDNew, 31, 2, 0.00, NOW()) -- School
,(@BudgetIDNew, 7, 2, 713.00, NOW()) -- Mortgage
,(@BudgetIDNew, 8, 2, 131.00, NOW()) -- Home Owners Fee
,(@BudgetIDNew, 9, 2, 22.00, NOW()) -- Home Insurance
,(@BudgetIDNew, 10, 2, 90.00, NOW()) -- LG&E
,(@BudgetIDNew, 11, 2, 230.00, NOW()) -- Cell Phone
,(@BudgetIDNew, 12, 2, 70.00, NOW()) -- Internet
,(@BudgetIDNew, 13, 2, 8.00, NOW()) -- Hulu Plus
,(@BudgetIDNew, 14, 2, 10.00, NOW()) -- Netflix
,(@BudgetIDNew, 15, 2, 0.00, NOW()) -- Medical
,(@BudgetIDNew, 16, 2, 320.00, NOW()) -- Grocery
,(@BudgetIDNew, 17, 2, 240.00, NOW()) -- Gas
,(@BudgetIDNew, 18, 2, 157.00, NOW()) -- Car Insurance
,(@BudgetIDNew, 19, 2, 10.00, NOW()) -- AAA
,(@BudgetIDNew, 20, 2, 12.00, NOW()) -- Car Registration
,(@BudgetIDNew, 21, 2, 450.00, NOW()) -- Needs
,(@BudgetIDNew, 22, 2, 340.00, NOW()) -- Wants
,(@BudgetIDNew, 23, 2, 100.00, NOW()) -- Gifts
,(@BudgetIDNew, 24, 2, 230.00, NOW()) -- Eat Out
,(@BudgetIDNew, 25, 2, 174.00, NOW()) -- WAM
-- ,(@BudgetIDNew, 32, 2, 0.00, NOW()) -- World Vision
;


