DELIMITER $$
CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `BudgetItemInsert`(BudgetID INT, BudgetCategoryID INT, BudgetTypeID INT, Amount DECIMAL(10, 4))
BEGIN
	INSERT INTO BudgetItem
    (
		BudgetID
        ,BudgetCategoryID
        ,BudgetTypeID
        ,Amount
        ,CreateDT
        ,CreateBy
    )
    SELECT	BudgetID
			,BudgetCategoryID
            ,BudgetTypeID
            ,Amount
            ,NOW()
            ,'System'
	;
END$$
DELIMITER ;
