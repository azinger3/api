DELIMITER $$
CREATE PROCEDURE `BudgetByMonthGet`(BudgetMonth DATETIME)
BEGIN

    DROP TEMPORARY TABLE IF EXISTS tmpBudget;

	CREATE TEMPORARY TABLE tmpBudget
	(
		KeyID                   INT(10) NOT NULL AUTO_INCREMENT
		,BudgetItemID           INT(10)
		,BudgetID               INT(10)
		,BudgetNumber           VARCHAR(100)
		,BudgetMonth            DATETIME
		,BudgetGroupID          INT(10)
		,BudgetGroup            VARCHAR(100)
		,BudgetCategoryID       INT(10)
		,BudgetCategory         VARCHAR(100)
		,BudgetTypeID           INT(10)
		,BudgetType             VARCHAR(100)
		,Note                   VARCHAR(1000)
		,Description            VARCHAR(1000)
		,IsEssential            INT(1)
		,HasSpotlight           INT(1)
		,ColorHighlight         VARCHAR(1000)
		,FundID                 INT(10)
		,Percentage             DECIMAL(10, 2)
		,AmountMonthly          DECIMAL(10, 0)
		,AmountBiWeekly         DECIMAL(10, 0)
		,AmountWeekly           DECIMAL(10, 0)
		,AmountBiYearly         DECIMAL(10, 0)
		,AmountYearly           DECIMAL(10, 0)
		,TotalIncomeMonthly     DECIMAL(10, 0)
		,TotalIncomeBiWeekly    DECIMAL(10, 0)
		,TotalIncomeWeekly      DECIMAL(10, 0)
		,TotalIncomeBiYearly    DECIMAL(10, 0)
		,TotalIncomeYearly      DECIMAL(10, 0)
		,TotalExpenseMonthly    DECIMAL(10, 0)
		,TotalExpenseBiWeekly   DECIMAL(10, 0)
		,TotalExpenseWeekly     DECIMAL(10, 0)
		,TotalExpenseBiYearly   DECIMAL(10, 0)
		,TotalExpenseYearly     DECIMAL(10, 0)
		,BalanceMonthly         DECIMAL(10, 0)
		,BalanceBiWeekly        DECIMAL(10, 0)
		,BalanceWeekly          DECIMAL(10, 0)
		,BalanceBiYearly        DECIMAL(10, 0)
		,BalanceYearly          DECIMAL(10, 0)
		,PRIMARY KEY (`KeyID`)
	);

	INSERT INTO tmpBudget
	(
		BudgetItemID
		,BudgetID
		,BudgetNumber
		,BudgetMonth
		,BudgetGroupID
		,BudgetGroup
		,BudgetCategoryID
		,BudgetCategory
		,BudgetTypeID
		,BudgetType
		,Note
		,Description
		,IsEssential
		,HasSpotlight
		,ColorHighlight
		,FundID
		,AmountMonthly
	)
	SELECT      BudgetItem.BudgetItemID
				,Budget.BudgetID
				,Budget.BudgetNumber
				,Budget.BudgetMonth
				,BudgetGroup.BudgetGroupID
				,BudgetGroup.BudgetGroup
				,BudgetCategory.BudgetCategoryID
				,BudgetCategory.BudgetCategory
				,BudgetType.BudgetTypeID
				,BudgetType.BudgetType
				,BudgetCategory.Note
				,BudgetCategory.Description
				,BudgetCategory.IsEssential
				,BudgetCategory.HasSpotlight
				,BudgetCategory.ColorHighlight
				,BudgetCategory.FundID
				,BudgetItem.Amount AS AmountMonthly
	FROM        Budget Budget
	INNER JOIN  BudgetItem BudgetItem
	ON          Budget.BudgetID = BudgetItem.BudgetID
	INNER JOIN  BudgetType BudgetType
	ON          BudgetType.BudgetTypeID = BudgetItem.BudgetTypeID
	INNER JOIN  BudgetCategory BudgetCategory
	ON          BudgetCategory.BudgetCategoryID = BudgetItem.BudgetCategoryID
	INNER JOIN  BudgetGroup BudgetGroup
	ON          BudgetGroup.BudgetGroupID = BudgetCategory.BudgetGroupID
	WHERE       TIMESTAMPDIFF(MONTH, Budget.BudgetMonth, BudgetMonth) = 0
    AND			Budget.ActiveFlg = 1
	ORDER BY    BudgetType.Sort
				,BudgetType.BudgetTypeID
				,BudgetGroup.Sort
				,BudgetGroup.BudgetGroupID
				,BudgetCategory.Sort
				,BudgetCategory.BudgetCategory;


	UPDATE      tmpBudget
	INNER JOIN  (
				  SELECT      BudgetItem.BudgetItemID
							  ,BudgetItem.Amount * 12 AS AmountYearly
				  FROM        Budget Budget
				  INNER JOIN  BudgetItem BudgetItem
				  ON          Budget.BudgetID = BudgetItem.BudgetID
				  WHERE       TIMESTAMPDIFF(MONTH, Budget.BudgetMonth, BudgetMonth) = 0
				) RS
	ON          tmpBudget.BudgetItemID = RS.BudgetItemID
	SET         tmpBudget.AmountYearly = RS.AmountYearly;


	UPDATE      tmpBudget
	SET         AmountBiWeekly = AmountYearly / 26
				,AmountWeekly = AmountYearly / 52
				,AmountBiYearly = AmountYearly / 2;


	UPDATE      tmpBudget
	SET         TotalIncomeMonthly = (
										SELECT      SUM(Amount) AS IncomeTotal
										FROM        Budget
										INNER JOIN  BudgetItem BudgetItem ON Budget.BudgetID = BudgetItem.BudgetID
										WHERE       BudgetTypeID = 1
										AND         TIMESTAMPDIFF(MONTH, Budget.BudgetMonth, BudgetMonth) = 0
										);


	UPDATE      tmpBudget
	SET         TotalIncomeYearly = TotalIncomeMonthly * 12;


	UPDATE      tmpBudget
	SET         TotalIncomeBiWeekly = TotalIncomeYearly / 26
				,TotalIncomeWeekly = TotalIncomeYearly / 52
				,TotalIncomeBiYearly = TotalIncomeYearly / 2;


	UPDATE      tmpBudget
	SET         TotalExpenseMonthly = (
										SELECT      SUM(Amount) AS ExpenseTotal
										FROM        Budget
										INNER JOIN  BudgetItem BudgetItem ON Budget.BudgetID = BudgetItem.BudgetID
										WHERE       BudgetTypeID = 2
										AND         TIMESTAMPDIFF(MONTH, Budget.BudgetMonth, BudgetMonth) = 0
										);


	UPDATE      tmpBudget
	SET         TotalExpenseYearly = TotalExpenseMonthly * 12;


	UPDATE      tmpBudget
	SET         TotalExpenseBiWeekly = TotalExpenseYearly / 26
				,TotalExpenseWeekly = TotalExpenseYearly / 52
				,TotalExpenseBiYearly = TotalExpenseYearly / 2;


	UPDATE      tmpBudget
	SET         BalanceMonthly = TotalIncomeMonthly - TotalExpenseMonthly
				,BalanceBiWeekly = TotalIncomeBiWeekly - TotalExpenseBiWeekly
				,BalanceWeekly = TotalIncomeWeekly - TotalExpenseWeekly
				,BalanceBiYearly = TotalIncomeBiYearly - TotalExpenseBiYearly
				,BalanceYearly = TotalIncomeYearly - TotalExpenseYearly;


	UPDATE      tmpBudget
	SET         Percentage = AmountYearly / TotalIncomeYearly;


	SELECT 	KeyID
			,BudgetItemID
			,BudgetID
			,BudgetNumber
			,BudgetMonth
			,BudgetGroupID
			,BudgetGroup
			,BudgetCategoryID
			,BudgetCategory
			,BudgetTypeID
			,BudgetType
			,Note
			,Description
			,IsEssential
			,HasSpotlight
			,ColorHighlight
			,FundID
			,Percentage
			,AmountMonthly
			,AmountBiWeekly
			,AmountWeekly
			,AmountBiYearly
			,AmountYearly
			,TotalIncomeMonthly
			,TotalIncomeBiWeekly
			,TotalIncomeWeekly
			,TotalIncomeBiYearly
			,TotalIncomeYearly
			,TotalExpenseMonthly
			,TotalExpenseBiWeekly
			,TotalExpenseWeekly
			,TotalExpenseBiYearly
			,TotalExpenseYearly
			,BalanceMonthly
			,BalanceBiWeekly
			,BalanceWeekly
			,BalanceBiYearly
			,BalanceYearly
	FROM 	tmpBudget;

END$$
DELIMITER ;
