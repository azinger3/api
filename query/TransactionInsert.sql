CREATE PROCEDURE `TransactionInsert`(TransactionTypeID INT, TransactionNumber VARCHAR(100), TransactionDT DATETIME, BudgetCategoryID INT, Amount DECIMAL(10 ,4), Description VARCHAR(1000), Note VARCHAR(1000))
BEGIN
	DECLARE BudgetID INT;
    
    SET BudgetID = (SELECT Budget.BudgetID FROM Budget Budget WHERE MONTH(Budget.BudgetMonth) = MONTH(TransactionDT));

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
            ,'User'
    ;
END