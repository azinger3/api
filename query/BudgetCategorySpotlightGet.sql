DELIMITER $$
CREATE PROCEDURE `BudgetCategorySpotlightGet`()
BEGIN
	DECLARE SessionID VARCHAR(100);
	DECLARE StartDT DATETIME;
	DECLARE EndDT DATETIME;

	SET SessionID = UUID();
	SET StartDT = CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') AS DATE);
	SET EndDT = DATE_ADD(LAST_DAY(NOW()), INTERVAL 1 DAY);

	INSERT INTO tmpBudgetCategorySpotlight
	(
		SessionID
		,BudgetCategoryID
		,BudgetCategory
		,Sort
	)
	SELECT 	SessionID							AS SessionID
			,BudgetCategory.BudgetCategoryID	AS BudgetCategoryID
			,BudgetCategory.BudgetCategory		AS BudgetCategory
			,BudgetCategory.Sort				AS Sort
	FROM 	BudgetCategory BudgetCategory
	WHERE 	BudgetCategory.HasSpotlight = 1
	AND 	BudgetCategory.FundID IS NULL
	;

	UPDATE		tmpBudgetCategorySpotlight
    INNER JOIN	(
					SELECT 		Budget.BudgetID	AS BudgetID
					FROM 		Budget Budget
                    WHERE		TIMESTAMPDIFF(MONTH, Budget.BudgetMonth, StartDT) = 0
				) RS
	SET			tmpBudgetCategorySpotlight.BudgetID = RS.BudgetID
	WHERE 		tmpBudgetCategorySpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetCategorySpotlight
    INNER JOIN	(
					SELECT 		BudgetItem.BudgetCategoryID	AS BudgetCategoryID
								,SUM(BudgetItem.Amount)		AS CategoryBudget
					FROM 		BudgetItem BudgetItem
                    INNER JOIN	tmpBudgetCategorySpotlight tmpBudgetCategorySpotlight
                    ON			tmpBudgetCategorySpotlight.BudgetCategoryID = BudgetItem.BudgetCategoryID
					AND			tmpBudgetCategorySpotlight.BudgetID = BudgetItem.BudgetID
                    WHERE		tmpBudgetCategorySpotlight.SessionID = SessionID
					GROUP BY	BudgetItem.BudgetCategoryID
				) RS
	ON			tmpBudgetCategorySpotlight.BudgetCategoryID = RS.BudgetCategoryID
	SET			tmpBudgetCategorySpotlight.CategoryBudget = RS.CategoryBudget
	WHERE 		tmpBudgetCategorySpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetCategorySpotlight
    INNER JOIN	(
					SELECT 		Transaction.BudgetCategoryID	AS BudgetCategoryID
								,SUM(Transaction.Amount)		AS CategoryActual
					FROM 		Transaction Transaction
                    WHERE		Transaction.TransactionDT BETWEEN StartDT AND EndDT
					GROUP BY	Transaction.BudgetCategoryID
				) RS
	ON			tmpBudgetCategorySpotlight.BudgetCategoryID = RS.BudgetCategoryID
	SET			tmpBudgetCategorySpotlight.CategoryActual = RS.CategoryActual
    WHERE 		tmpBudgetCategorySpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetCategorySpotlight
	SET			tmpBudgetCategorySpotlight.CategoryActualVsBudget = IFNULL(CategoryBudget, 0) - IFNULL(CategoryActual, 0)
    WHERE 		tmpBudgetCategorySpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetCategorySpotlight
    INNER JOIN	(
					SELECT 		SUM(tmpBudgetCategorySpotlight.CategoryActualVsBudget)	AS TotalCategoryActualVsBudget
					FROM 		tmpBudgetCategorySpotlight tmpBudgetCategorySpotlight
				) RS
	SET			tmpBudgetCategorySpotlight.TotalCategoryActualVsBudget = RS.TotalCategoryActualVsBudget
    WHERE 		tmpBudgetCategorySpotlight.SessionID = SessionID
    ;

	SELECT	KeyID									AS KeyID
			,SessionID								AS SessionID
            ,BudgetID								AS BudgetID
			,BudgetCategoryID						AS BudgetCategoryID
			,BudgetCategory							AS BudgetCategory
			,Sort									AS Sort
			,IFNULL(CategoryActual, 0)				AS CategoryActual
            ,IFNULL(CategoryBudget, 0)				AS CategoryBudget
            ,IFNULL(CategoryActualVsBudget, 0)		AS CategoryActualVsBudget
            ,IFNULL(TotalCategoryActualVsBudget, 0)	AS TotalCategoryActualVsBudget
	FROM	tmpBudgetCategorySpotlight tmpBudgetCategorySpotlight
    WHERE	tmpBudgetCategorySpotlight.SessionID = SessionID
	;

	DELETE FROM	tmpBudgetCategorySpotlight
	WHERE		tmpBudgetCategorySpotlight.SessionID = SessionID;
END$$
DELIMITER ;
