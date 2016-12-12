CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `BudgetGet`()
BEGIN
	SELECT 		Budget.BudgetID
				,Budget.BudgetNumber
				,Budget.BudgetMonth
				,DATE_FORMAT(Budget.BudgetMonth,'%M %Y') AS BudgetMonthSummary
                ,DATE_FORMAT(Budget.BudgetMonth,'%Y-%m-%d') AS BudgetMonthSummaryUrl
				,Budget.CreateDT
				,Budget.CreateBy
				,Budget.ModifyDT
				,Budget.ModifyBy
				,Budget.ActiveFlg
	FROM 		Budget Budget
	ORDER BY	Budget.BudgetMonth DESC
	;
END