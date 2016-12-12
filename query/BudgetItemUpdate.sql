CREATE PROCEDURE `BudgetItemUpdate`(BudgetItemID INT, Amount DECIMAL(10, 4))
BEGIN
	UPDATE	BudgetItem BudgetItem
	SET		BudgetItem.Amount 		= Amount
			,BudgetItem.ModifyDT	= NOW()
            ,BudgetItem.ModifyBy 	= 'User'
    WHERE 	BudgetItem.BudgetItemID = BudgetItemID
    ;
END