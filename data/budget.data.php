<?php

class BudgetData extends BudgetModel
{
	public function BudgetGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetByMonthValidate()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetByMonthValidate(:BudgetMonth)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseByMonthGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetExpenseByMonthGet(:budgetMonth)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':budgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeByMonthGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetIncomeByMonthGet(:budgetMonth)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':budgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeDetailGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetIncomeDetailGet(:BudgetIncomeID)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetIncomeID', $this->BudgetIncomeID, PDO::PARAM_INT);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseDetailGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetExpenseDetailGet(:BudgetItemID)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetItemID', $this->BudgetItemID, PDO::PARAM_INT);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetGroupGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetGroupGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetGroupByKeywordGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetGroupByKeywordGet(:Keyword)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetCategoryGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetCategoryGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetCategoryByKeywordGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetCategoryByKeywordGet(:Keyword)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetCategorySpotlightGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetCategorySpotlightGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetFundGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetFundGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetFundByKeywordGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetFundByKeywordGet(:Keyword)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetFundSpotlightGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetFundSpotlightGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetSummarySpotlightGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetSummarySpotlightGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetSummaryGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetSummaryGet(:BudgetMonth)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetAverageGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetAverageGet(:StartDT, :EndDT)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':StartDT', $this->StartDT, PDO::PARAM_STR);
			$statement->bindParam(':EndDT', $this->EndDT, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetBreakdownGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetBreakdownGet(:StartDT, :EndDT)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':StartDT', $this->StartDT, PDO::PARAM_STR);
			$statement->bindParam(':EndDT', $this->EndDT, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetYearGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetYearGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function TransactionDescriptionGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL TransactionDescriptionGet(:Keyword)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function TransactionRecentGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL TransactionRecentGet()";

			$statement = $database->prepare($sql);

			// Execute database statement
			$statement->execute();

			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			// Close database resources
			$database = null;

			// Return results
			return $result;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetByMonthInsert()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetByMonthInsert(:BudgetMonth)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeInsert()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetIncomeInsert(:BudgetNumber,:IncomeName,:IncomeTypeID,:IncomeType,:PayCycleID,:PayCycle,:TakeHomePay,:HourlyRate,:PlannedHours,:Salary,:YearDeduct)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetNumber', $this->BudgetNumber, PDO::PARAM_INT);
			$statement->bindParam(':IncomeName', $this->IncomeName, PDO::PARAM_STR);
			$statement->bindParam(':IncomeTypeID', $this->IncomeTypeID, PDO::PARAM_INT);
			$statement->bindParam(':IncomeType', $this->IncomeType, PDO::PARAM_STR);
			$statement->bindParam(':PayCycleID', $this->PayCycleID, PDO::PARAM_INT);
			$statement->bindParam(':PayCycle', $this->PayCycle, PDO::PARAM_STR);
			$statement->bindParam(':TakeHomePay', $this->TakeHomePay, PDO::PARAM_STR);
			$statement->bindParam(':HourlyRate', $this->HourlyRate, PDO::PARAM_STR);
			$statement->bindParam(':PlannedHours', $this->PlannedHours, PDO::PARAM_STR);
			$statement->bindParam(':Salary', $this->Salary, PDO::PARAM_STR);
			$statement->bindParam(':YearDeduct', $this->YearDeduct, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function TransactionInsert()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL TransactionInsert(:TransactionTypeID,:TransactionNumber,:TransactionDT,:BudgetCategoryID,:Amount,:Description,:Note)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':TransactionTypeID', $this->TransactionTypeID, PDO::PARAM_INT);
			$statement->bindParam(':TransactionNumber', $this->TransactionNumber, PDO::PARAM_STR);
			$statement->bindParam(':TransactionDT', $this->TransactionDT, PDO::PARAM_STR);
			$statement->bindParam(':BudgetCategoryID', $this->BudgetCategoryID, PDO::PARAM_INT);
			$statement->bindParam(':Amount', $this->Amount, PDO::PARAM_STR);
			$statement->bindParam(':Description', $this->Description, PDO::PARAM_STR);
			$statement->bindParam(':Note', $this->Note, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function TransactionUpdate()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL TransactionUpdate(:TransactionID,:TransactionNumber,:TransactionDT,:BudgetID,:BudgetCategoryID,:Amount,:Description,:Note)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':TransactionID', $this->TransactionID, PDO::PARAM_INT);
			$statement->bindParam(':TransactionNumber', $this->TransactionNumber, PDO::PARAM_STR);
			$statement->bindParam(':TransactionDT', $this->TransactionDT, PDO::PARAM_STR);
			$statement->bindParam(':BudgetID', $this->BudgetID, PDO::PARAM_INT);
			$statement->bindParam(':BudgetCategoryID', $this->BudgetCategoryID, PDO::PARAM_INT);
			$statement->bindParam(':Amount', $this->Amount, PDO::PARAM_STR);
			$statement->bindParam(':Description', $this->Description, PDO::PARAM_STR);
			$statement->bindParam(':Note', $this->Note, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeUpdate()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetIncomeUpdate(:BudgetIncomeID,:BudgetNumber,:IncomeName,:IncomeTypeID,:IncomeType,:PayCycleID,:PayCycle,:TakeHomePay,:HourlyRate,:PlannedHours,:Salary,:YearDeduct)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetIncomeID', $this->BudgetIncomeID, PDO::PARAM_INT);
			$statement->bindParam(':BudgetNumber', $this->BudgetNumber, PDO::PARAM_INT);
			$statement->bindParam(':IncomeName', $this->IncomeName, PDO::PARAM_STR);
			$statement->bindParam(':IncomeTypeID', $this->IncomeTypeID, PDO::PARAM_INT);
			$statement->bindParam(':IncomeType', $this->IncomeType, PDO::PARAM_STR);
			$statement->bindParam(':PayCycleID', $this->PayCycleID, PDO::PARAM_INT);
			$statement->bindParam(':PayCycle', $this->PayCycle, PDO::PARAM_STR);
			$statement->bindParam(':TakeHomePay', $this->TakeHomePay, PDO::PARAM_STR);
			$statement->bindParam(':HourlyRate', $this->HourlyRate, PDO::PARAM_STR);
			$statement->bindParam(':PlannedHours', $this->PlannedHours, PDO::PARAM_STR);
			$statement->bindParam(':Salary', $this->Salary, PDO::PARAM_STR);
			$statement->bindParam(':YearDeduct', $this->YearDeduct, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseUpdate()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetExpenseUpdate(:BudgetItemID,:BudgetNumber,:Amount,:BudgetGroupID,:BudgetGroup,:BudgetCategoryID,:BudgetCategory,:Description,:Note,:IsEssential,:HasSpotlight,:ColorHighlight,:HasFundFlg,:FundID,:FundName,:StartingBalance)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetItemID', $this->BudgetItemID, PDO::PARAM_INT);
			$statement->bindParam(':BudgetNumber', $this->BudgetNumber, PDO::PARAM_INT);
			$statement->bindParam(':Amount', $this->Amount, PDO::PARAM_STR);
			$statement->bindParam(':BudgetGroupID', $this->BudgetGroupID, PDO::PARAM_INT);
			$statement->bindParam(':BudgetGroup', $this->BudgetGroup, PDO::PARAM_STR);
			$statement->bindParam(':BudgetCategoryID', $this->BudgetCategoryID, PDO::PARAM_INT);
			$statement->bindParam(':BudgetCategory', $this->BudgetCategory, PDO::PARAM_STR);
			$statement->bindParam(':Description', $this->Description, PDO::PARAM_STR);
			$statement->bindParam(':Note', $this->Note, PDO::PARAM_STR);
			$statement->bindParam(':IsEssential', $this->IsEssential, PDO::PARAM_STR);
			$statement->bindParam(':HasSpotlight', $this->HasSpotlight, PDO::PARAM_STR);
			$statement->bindParam(':ColorHighlight', $this->ColorHighlight, PDO::PARAM_STR);
			$statement->bindParam(':HasFundFlg', $this->HasFundFlg, PDO::PARAM_STR);
			$statement->bindParam(':FundID', $this->FundID, PDO::PARAM_INT);
			$statement->bindParam(':FundName', $this->FundName, PDO::PARAM_STR);
			$statement->bindParam(':StartingBalance', $this->StartingBalance, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function TransactionDelete()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL TransactionDelete(:TransactionID)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':TransactionID', $this->TransactionID, PDO::PARAM_INT);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetByMonthDelete()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetByMonthDelete(:BudgetNumber)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetNumber', $this->BudgetNumber, PDO::PARAM_INT);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeDelete()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetIncomeDelete(:BudgetIncomeID)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetIncomeID', $this->BudgetIncomeID, PDO::PARAM_INT);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseDelete()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetExpenseDelete(:BudgetItemID)";

			$statement = $database->prepare($sql);
			$statement->bindParam(':BudgetItemID', $this->BudgetItemID, PDO::PARAM_INT);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}
}
