DELIMITER $$
CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `TransactionDelete`(TransactionID INT)
BEGIN
	DELETE FROM Transaction
    WHERE Transaction.TransactionID = TransactionID
    ;
END$$
DELIMITER ;
