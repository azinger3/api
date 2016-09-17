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
}
