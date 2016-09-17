DELIMITER $$
CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `TransactionInsert`(TransactionTypeID INT, TransactionNumber VARCHAR(100), TransactionDT DATETIME, BudgetID INT, BudgetCategoryID INT, Amount DECIMAL(10 ,4), Description VARCHAR(1000), Note VARCHAR(1000))
BEGIN
	INSERT INTO Transaction
    (
		TransactionTypeID
        ,TransactionNumber
        ,TransactionDT
        ,BudgetID
        ,BudgetCategoryID
        ,Amount
        ,Description
        ,Note
        ,CreateDT
        ,CreateBy
    )
    SELECT	TransactionTypeID
			,TransactionNumber
			,TransactionDT
			,BudgetID
			,BudgetCategoryID
			,Amount
			,Description
            ,Note
            ,NOW()
            ,'System'
    ;
END$$
DELIMITER ;
