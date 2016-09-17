DELIMITER $$
CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `BudgetItemUpdate`(BudgetItemID INT, Amount DECIMAL(10, 4))
BEGIN
	UPDATE	BudgetItem BudgetItem
	SET		BudgetItem.Amount 		= Amount
			,BudgetItem.ModifyDT	= NOW()
            ,BudgetItem.ModifyBy 	= 'User'
    WHERE 	BudgetItem.BudgetItemID = BudgetItemID
    ;
END$$
DELIMITER ;
