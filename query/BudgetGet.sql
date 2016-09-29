DELIMITER $$
CREATE PROCEDURE `BudgetGet`()
BEGIN
    SELECT 	BudgetID
			,BudgetNumber
			,BudgetMonth
			,CreateDT
            ,CreateBy
			,ModifyDT
            ,ModifyBy
			,ActiveFlg
	FROM 	Budget
    WHERE	ActiveFlg = 1
    ;
END$$
DELIMITER ;
