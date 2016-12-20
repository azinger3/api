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

	public function BudgetByMonthGet()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetByMonthGet(:budgetMonth)";

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

	public function BudgetInsert()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL BudgetInsert(:BudgetMonth)";

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
}
