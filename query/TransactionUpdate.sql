DELIMITER $$
CREATE PROCEDURE `TransactionUpdate`(TransactionID INT, TransactionNumber VARCHAR(100), TransactionDT DATETIME, BudgetID INT, BudgetCategoryID INT, Amount DECIMAL(10 ,4), Description VARCHAR(1000), Note VARCHAR(1000))
BEGIN
	UPDATE	Transaction
    SET		Transaction.TransactionNumber 	= TransactionNumber
			,Transaction.TransactionDT 		= TransactionDT
            ,Transaction.BudgetID 			= BudgetID
            ,Transaction.BudgetCategoryID 	= BudgetCategoryID
            ,Transaction.Amount 			= Amount
            ,Transaction.Description 		= Description
            ,Transaction.Note 				= Note
            ,Transaction.ModifyDT			= NOW()
            ,Transaction.ModifyBy			= 'User'
	WHERE	Transaction.TransactionID = TransactionID
    ;
END$$
DELIMITER ;
