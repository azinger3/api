DELIMITER $$
CREATE DEFINER=`PlannerSysAdmin`@`74.130.35.209` PROCEDURE `TransactionDescriptionGet`()
BEGIN
	SET @Description = '';			
	SET @TransactionDT = '';
	SET @TransactionID = '';
	SET @i = 1;

	SELECT 	RS.Description
			,RS.TransactionDT
			,RS.TransactionID
			,RS.Amount
	FROM	(
				SELECT  RSRank.Description
						,RSRank.TransactionDT
						,RSRank.TransactionID
						,RSRank.Amount
						,RSRank.RANK
				FROM
				(
					SELECT  RSTransaction.Description
							,RSTransaction.TransactionDT
							,RSTransaction.TransactionID
							,RSTransaction.Amount
							,@i := IF	(
											@Description = RSTransaction.Description, 
												IF	(
														@TransactionDT = RSTransaction.TransactionDT, 
															IF	(
																	@TransactionID = RSTransaction.TransactionID, 
																		@i, 
																	@i + 1 -- ELSE TransactionID
																), 
														@i + 1 -- ELSE TransactionDT
													),
											1 -- ELSE Description
										) AS RANK
							,@Description := RSTransaction.Description    
							,@TransactionDT := RSTransaction.TransactionDT
							,@TransactionID := RSTransaction.TransactionID
					FROM
					(
						SELECT  Description
								,TransactionDT
								,TransactionID
								,Amount
						FROM    Transaction Transaction
						ORDER BY Description, TransactionDT DESC,TransactionID DESC
					) RSTransaction
				) RSRank
			) RS
	WHERE RS.RANK = 1
	;
END$$
DELIMITER ;
