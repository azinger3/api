DELIMITER $$
CREATE PROCEDURE `BudgetFundSpotlightGet`()
BEGIN
	DECLARE SessionID VARCHAR(100);
	DECLARE StartDT DATETIME;
	DECLARE EndDT DATETIME;

	SET SessionID = UUID();
	SET StartDT = CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') AS DATE);
	SET EndDT = DATE_ADD(LAST_DAY(NOW()), INTERVAL 1 DAY);

	INSERT INTO tmpBudgetFundSpotlight
	(
		SessionID
		,BudgetCategoryID
		,BudgetCategory
		,Sort
        ,FundID
        ,FundName
        ,StartingBalance
	)
	SELECT 		SessionID							AS SessionID
				,BudgetCategory.BudgetCategoryID	AS BudgetCategoryID
				,BudgetCategory.BudgetCategory		AS BudgetCategory
				,BudgetCategory.Sort				AS Sort
				,Fund.FundID 						AS FundID
				,Fund.FundName 						AS FundName
				,Fund.StartingBalance 				AS StartingBalance
	FROM 		BudgetCategory BudgetCategory
    INNER JOIN	Fund Fund
    ON			Fund.FundID = BudgetCategory.FundID
	WHERE 		BudgetCategory.HasSpotlight = 1
	;

    UPDATE		tmpBudgetFundSpotlight
    INNER JOIN	(
					SELECT 		Budget.BudgetID	AS BudgetID
					FROM 		Budget Budget
                    WHERE		TIMESTAMPDIFF(MONTH, Budget.BudgetMonth, StartDT) = 0
				) RS
	SET			tmpBudgetFundSpotlight.BudgetID = RS.BudgetID
	WHERE 		tmpBudgetFundSpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetFundSpotlight
    INNER JOIN	(
					SELECT 		Transaction.BudgetCategoryID	AS BudgetCategoryID
								,SUM(Transaction.Amount)		AS FundSpent
					FROM 		Transaction Transaction
                    INNER JOIN	tmpBudgetFundSpotlight tmpBudgetFundSpotlight
                    ON			tmpBudgetFundSpotlight.BudgetCategoryID = Transaction.BudgetCategoryID
                    WHERE		tmpBudgetFundSpotlight.SessionID = SessionID
                    AND			Transaction.TransactionDT BETWEEN StartDT AND EndDT
                    AND			Transaction.TransactionTypeID = 2
					GROUP BY	Transaction.BudgetCategoryID
				) RS
	ON			tmpBudgetFundSpotlight.BudgetCategoryID = RS.BudgetCategoryID
	SET			tmpBudgetFundSpotlight.FundSpent = RS.FundSpent
    WHERE 		tmpBudgetFundSpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetFundSpotlight
    INNER JOIN	(
					SELECT 		Transaction.BudgetCategoryID	AS BudgetCategoryID
								,SUM(Transaction.Amount)		AS FundReceived
					FROM 		Transaction Transaction
                    INNER JOIN	tmpBudgetFundSpotlight tmpBudgetFundSpotlight
                    ON			tmpBudgetFundSpotlight.BudgetCategoryID = Transaction.BudgetCategoryID
                    WHERE		tmpBudgetFundSpotlight.SessionID = SessionID
                    AND			Transaction.TransactionDT BETWEEN StartDT AND EndDT
                    AND			Transaction.TransactionTypeID = 1
					GROUP BY	Transaction.BudgetCategoryID
				) RS
	ON			tmpBudgetFundSpotlight.BudgetCategoryID = RS.BudgetCategoryID
	SET			tmpBudgetFundSpotlight.FundReceived = RS.FundReceived
    WHERE 		tmpBudgetFundSpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetFundSpotlight
	SET			tmpBudgetFundSpotlight.FundReceivedPlusStartingBalance = IFNULL(tmpBudgetFundSpotlight.FundReceived, 0) + IFNULL(tmpBudgetFundSpotlight.StartingBalance, 0)
    WHERE 		tmpBudgetFundSpotlight.SessionID = SessionID
    ;

	UPDATE		tmpBudgetFundSpotlight
	SET			tmpBudgetFundSpotlight.FundSpentVsReceived = IFNULL(tmpBudgetFundSpotlight.FundReceivedPlusStartingBalance, 0) - IFNULL(tmpBudgetFundSpotlight.FundSpent, 0)
    WHERE 		tmpBudgetFundSpotlight.SessionID = SessionID
    ;

    SELECT 	tmpBudgetFundSpotlight.KeyID 										AS KeyID
			,tmpBudgetFundSpotlight.SessionID 									AS SessionID
			,tmpBudgetFundSpotlight.BudgetID 									AS BudgetID
			,tmpBudgetFundSpotlight.BudgetCategoryID 							AS BudgetCategoryID
			,tmpBudgetFundSpotlight.BudgetCategory 								AS BudgetCategory
			,tmpBudgetFundSpotlight.Sort 										AS Sort
			,tmpBudgetFundSpotlight.FundID 										AS FundID
			,tmpBudgetFundSpotlight.FundName 									AS FundName
			,tmpBudgetFundSpotlight.StartingBalance 							AS StartingBalance
			,IFNULL(tmpBudgetFundSpotlight.FundSpent, 0)						AS FundSpent
            ,IFNULL(tmpBudgetFundSpotlight.FundReceived, 0)						AS FundReceived
			,IFNULL(tmpBudgetFundSpotlight.FundReceivedPlusStartingBalance, 0)	AS FundReceivedPlusStartingBalance
            ,IFNULL(tmpBudgetFundSpotlight.FundSpentVsReceived, 0)				AS FundSpentVsReceived
	FROM 	tmpBudgetFundSpotlight tmpBudgetFundSpotlight
    WHERE	tmpBudgetFundSpotlight.SessionID = SessionID
    ;

	DELETE FROM	tmpBudgetFundSpotlight
	WHERE		tmpBudgetFundSpotlight.SessionID = SessionID
    ;
END$$
DELIMITER ;
