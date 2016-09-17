DELIMITER $$
CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `TransactionSummaryGet`(BudgetCategoryID INT, Keyword VARCHAR(100), StartDT DATETIME, EndDT DATETIME)
BEGIN
	DECLARE SessionID VARCHAR(100);
	DECLARE TimeSpanMonth INT;
    
    SET SessionID = UUID();
    SET TimeSpanMonth = TIMESTAMPDIFF(MONTH, StartDT, EndDT);

    INSERT INTO tmpTransactionSummary
    (
		SessionID
        ,TransactionID
		,TransactionDT
		,TransactionTypeID
		,TransactionType
		,TransactionNumber
		,Description
		,Amount
		,Note
        ,BudgetID
		,BudgetGroupID
		,BudgetGroup
		,BudgetCategoryID
		,BudgetCategory
		,HasSpotlight
		,Sort
    )
    SELECT		SessionID							AS SessionID
				,Transaction.TransactionID			AS TransactionID
				,Transaction.TransactionDT			AS TransactionDT
				,TransactionType.TransactionTypeID	AS TransactionTypeID
				,TransactionType.TransactionType	AS TransactionType
				,Transaction.TransactionNumber		AS TransactionNumber
				,Transaction.Description			AS Description
				,Transaction.Amount					AS Amount
				,Transaction.Note					AS Note
                ,Transaction.BudgetID				AS BudgetID
				,BudgetGroup.BudgetGroupID			AS BudgetGroupID
				,BudgetGroup.BudgetGroup			AS BudgetGroup
				,BudgetCategory.BudgetCategoryID	AS BudgetCategoryID
				,BudgetCategory.BudgetCategory		AS BudgetCategory
				,BudgetCategory.HasSpotlight		AS HasSpotlight
				,BudgetCategory.Sort				AS Sort
	FROM		Transaction Transaction
    INNER JOIN	TransactionType TransactionType
    ON			TransactionType.TransactionTypeID = Transaction.TransactionTypeID
	INNER JOIN	BudgetCategory BudgetCategory
    ON			BudgetCategory.BudgetCategoryID = Transaction.BudgetCategoryID
    INNER JOIN	BudgetGroup BudgetGroup
    ON			BudgetGroup.BudgetGroupID = BudgetCategory.BudgetGroupID
    WHERE		(Transaction.TransactionDT BETWEEN StartDT AND EndDT OR (StartDT IS NULL AND EndDT IS NULL))
    AND			(Transaction.Description LIKE CONCAT('%', Keyword, '%') OR Keyword IS NULL)
    AND			(Transaction.BudgetCategoryID = BudgetCategoryID OR BudgetCategoryID IS NULL)
	;
	    
	UPDATE		tmpTransactionSummary
    INNER JOIN	(
					SELECT 		BudgetItem.BudgetCategoryID	AS BudgetCategoryID
								,SUM(BudgetItem.Amount)		AS CategoryBudget 
					FROM 		BudgetItem BudgetItem
                    INNER JOIN	tmpTransactionSummary tmpTransactionSummary	
                    ON			tmpTransactionSummary.BudgetCategoryID = BudgetItem.BudgetCategoryID
					AND			tmpTransactionSummary.BudgetID = BudgetItem.BudgetID
                    WHERE		tmpTransactionSummary.SessionID = SessionID
					GROUP BY	BudgetItem.BudgetCategoryID
				) RS
	ON			tmpTransactionSummary.BudgetCategoryID = RS.BudgetCategoryID
	SET			tmpTransactionSummary.CategoryBudget = RS.CategoryBudget
	WHERE 		tmpTransactionSummary.SessionID = SessionID
    ;
    
    UPDATE		tmpTransactionSummary
    INNER JOIN	(
					SELECT 		tmpTransactionSummary.BudgetCategoryID	AS BudgetCategoryID
								,SUM(tmpTransactionSummary.Amount)		AS CategoryActual 
					FROM 		tmpTransactionSummary tmpTransactionSummary	
                    WHERE 		tmpTransactionSummary.SessionID = SessionID
					GROUP BY	tmpTransactionSummary.BudgetCategoryID
				) RS
	ON			tmpTransactionSummary.BudgetCategoryID = RS.BudgetCategoryID
	SET			tmpTransactionSummary.CategoryActual = RS.CategoryActual
    WHERE 		tmpTransactionSummary.SessionID = SessionID
    ;
    
    UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.CategoryActualVsBudget = tmpTransactionSummary.CategoryBudget - tmpTransactionSummary.CategoryActual
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
    UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.CategoryAverage = tmpTransactionSummary.CategoryActual / TimeSpanMonth
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
    UPDATE		tmpTransactionSummary
    INNER JOIN	(
					SELECT 		SUM(tmpTransactionSummary.Amount)	AS IncomeActual 
					FROM 		tmpTransactionSummary tmpTransactionSummary	
                    WHERE 		tmpTransactionSummary.SessionID = SessionID
                    AND			tmpTransactionSummary.TransactionTypeID = 1
					GROUP BY	tmpTransactionSummary.TransactionTypeID
				) RS
	SET			tmpTransactionSummary.IncomeActual = RS.IncomeActual
    WHERE 		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    INNER JOIN	(
					SELECT 		SUM(rsTransactionSummary.CategoryBudget)	AS IncomeBudget 
					FROM 		(
									SELECT	DISTINCT
											tmpTransactionSummary.CategoryBudget	AS CategoryBudget
									FROM	tmpTransactionSummary tmpTransactionSummary
                                    WHERE 	tmpTransactionSummary.SessionID = SessionID
                                    AND 	tmpTransactionSummary.TransactionTypeID = 1
								) rsTransactionSummary
				) RS
	SET			tmpTransactionSummary.IncomeBudget = RS.IncomeBudget
    WHERE 		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.IncomeActualVsBudget = tmpTransactionSummary.IncomeBudget - tmpTransactionSummary.IncomeActual
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.IncomeAverage = tmpTransactionSummary.IncomeActual / TimeSpanMonth
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;

    UPDATE		tmpTransactionSummary
    INNER JOIN	(
					SELECT 		SUM(tmpTransactionSummary.Amount)	AS ExpenseActual 
					FROM 		tmpTransactionSummary tmpTransactionSummary	
                    WHERE 		tmpTransactionSummary.SessionID = SessionID
                    AND			tmpTransactionSummary.TransactionTypeID = 2
					GROUP BY	tmpTransactionSummary.TransactionTypeID
				) RS
	SET			tmpTransactionSummary.ExpenseActual = RS.ExpenseActual
    WHERE 		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    INNER JOIN	(
					SELECT 		SUM(rsTransactionSummary.CategoryBudget)	AS ExpenseBudget 
					FROM 		(
									SELECT	DISTINCT
											tmpTransactionSummary.CategoryBudget	AS CategoryBudget
									FROM	tmpTransactionSummary tmpTransactionSummary
                                    WHERE 	tmpTransactionSummary.SessionID = SessionID
                                    AND 	tmpTransactionSummary.TransactionTypeID = 2
								) rsTransactionSummary
				) RS
	SET			tmpTransactionSummary.ExpenseBudget = RS.ExpenseBudget
    WHERE 		tmpTransactionSummary.SessionID = SessionID
    ;

	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.ExpenseActualVsBudget = tmpTransactionSummary.ExpenseBudget - tmpTransactionSummary.ExpenseActual
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.ExpenseAverage = tmpTransactionSummary.ExpenseActual / TimeSpanMonth
    WHERE		tmpTransactionSummary.SessionID = SessionID
	;
    
	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.TotalIncomeVsExpenseActual = tmpTransactionSummary.IncomeActual - tmpTransactionSummary.ExpenseActual
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.TotalIncomeVsExpenseBudget = tmpTransactionSummary.IncomeBudget - tmpTransactionSummary.ExpenseBudget
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.TotalIncomeVsExpenseActualVsBudget = tmpTransactionSummary.TotalIncomeVsExpenseBudget - tmpTransactionSummary.TotalIncomeVsExpenseActual
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;

	UPDATE		tmpTransactionSummary
    SET			tmpTransactionSummary.TotalIncomeVsExpenseAverage = tmpTransactionSummary.IncomeAverage - tmpTransactionSummary.ExpenseAverage
    WHERE		tmpTransactionSummary.SessionID = SessionID
    ;
    
	SELECT 	tmpTransactionSummary.KeyID,
			tmpTransactionSummary.SessionID,
			tmpTransactionSummary.TransactionID,
			tmpTransactionSummary.TransactionDT,
			tmpTransactionSummary.TransactionTypeID,
			tmpTransactionSummary.TransactionType,
			tmpTransactionSummary.TransactionNumber,
			tmpTransactionSummary.Description,
			tmpTransactionSummary.Amount,
			tmpTransactionSummary.Note,
			tmpTransactionSummary.BudgetID,
			tmpTransactionSummary.BudgetGroupID,
			tmpTransactionSummary.BudgetGroup,
			tmpTransactionSummary.BudgetCategoryID,
			tmpTransactionSummary.BudgetCategory,
			tmpTransactionSummary.HasSpotlight,
			tmpTransactionSummary.Sort,
			tmpTransactionSummary.CategoryActual,
			tmpTransactionSummary.CategoryBudget,
			tmpTransactionSummary.CategoryActualVsBudget,
			tmpTransactionSummary.CategoryAverage,
			tmpTransactionSummary.IncomeActual,
			tmpTransactionSummary.IncomeBudget,
			tmpTransactionSummary.IncomeActualVsBudget,
			tmpTransactionSummary.IncomeAverage,
			tmpTransactionSummary.ExpenseActual,
			tmpTransactionSummary.ExpenseBudget,
			tmpTransactionSummary.ExpenseActualVsBudget,
			tmpTransactionSummary.ExpenseAverage,
			tmpTransactionSummary.TotalIncomeVsExpenseActual,
			tmpTransactionSummary.TotalIncomeVsExpenseBudget,
			tmpTransactionSummary.TotalIncomeVsExpenseActualVsBudget,
			tmpTransactionSummary.TotalIncomeVsExpenseAverage
	FROM 	tmpTransactionSummary tmpTransactionSummary
    WHERE	tmpTransactionSummary.SessionID = SessionID;

	DELETE FROM	tmpTransactionSummary 
    WHERE		tmpTransactionSummary.SessionID = SessionID;

	-- select concat(ifnull(BudgetCategoryID, ''), ' - ',ifnull(Keyword,''), ' - ',StartDT, ' - ',EndDT, ' - ',SessionID, ' - ',TimeSpanMonth);
    
END$$
DELIMITER ;
