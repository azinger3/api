<?php

class BudgetData extends BudgetModel
{
	public function BudgetGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetGet()");
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetByMonthValidate()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetByMonthValidate(:BudgetMonth)");
			$statement->bindParam(':BudgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseByMonthGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetExpenseByMonthGet(:budgetMonth)");
			$statement->bindParam(':budgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeByMonthGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetIncomeByMonthGet(:budgetMonth)");
			$statement->bindParam(':budgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeDetailGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetIncomeDetailGet(:BudgetIncomeID)");
			$statement->bindParam(':BudgetIncomeID', $this->BudgetIncomeID, PDO::PARAM_INT);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseDetailGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetExpenseDetailGet(:BudgetItemID)");
			$statement->bindParam(':BudgetItemID', $this->BudgetItemID, PDO::PARAM_INT);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetGroupGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetGroupGet()");
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetGroupByKeywordGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetGroupByKeywordGet(:Keyword)");
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetCategoryGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetCategoryGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetCategoryByKeywordGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetCategoryByKeywordGet(:Keyword)");
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetCategorySpotlightGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetCategorySpotlightGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetFundGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetFundGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetFundByKeywordGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetFundByKeywordGet(:Keyword)");
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetFundSpotlightGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetFundSpotlightGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetFundSummaryGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetFundSummaryGet(:FundID)");
			$statement->bindParam(':FundID', $this->FundID, PDO::PARAM_INT);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetSummarySpotlightGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetSummarySpotlightGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetSummaryGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetSummaryGet(:BudgetMonth)");
			$statement->bindParam(':BudgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetAverageGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetAverageGet(:StartDT, :EndDT)");
			$statement->bindParam(':StartDT', $this->StartDT, PDO::PARAM_STR);
			$statement->bindParam(':EndDT', $this->EndDT, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetAverageMonthlySnapshotGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetAverageMonthlySnapshotGet()");
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetAverageMonthlySnapshotGenerate()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetAverageMonthlySnapshotGenerate(:StartDT, :EndDT)");
			$statement->bindParam(':StartDT', $this->StartDT, PDO::PARAM_STR);
			$statement->bindParam(':EndDT', $this->EndDT, PDO::PARAM_STR);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetBreakdownGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetBreakdownGet(:StartDT, :EndDT)");
			$statement->bindParam(':StartDT', $this->StartDT, PDO::PARAM_STR);
			$statement->bindParam(':EndDT', $this->EndDT, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetYearGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetYearGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionDescriptionGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionDescriptionGet(:Keyword)");
			$statement->bindParam(':Keyword', $this->Keyword, PDO::PARAM_STR);

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionRecentGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionRecentGet()");

			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionSpotlightGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionSpotlightGet(:EffectiveDT)");
			$statement->bindParam(':EffectiveDT', $this->EffectiveDT, PDO::PARAM_STR);

			$statement->execute();
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionLeaderboardGet()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionLeaderboardGet(:EffectiveDT)");
			$statement->bindParam(':EffectiveDT', $this->EffectiveDT, PDO::PARAM_STR);

			$statement->execute();
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

			$result = $statement->fetchAll();

			$database = null;

			return $result;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetByMonthInsert()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetByMonthInsert(:BudgetMonth)");
			$statement->bindParam(':BudgetMonth', $this->BudgetMonth, PDO::PARAM_STR);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeInsert()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetIncomeInsert(:BudgetNumber,:IncomeName,:IncomeTypeID,:IncomeType,:PayCycleID,:PayCycle,:TakeHomePay,:HourlyRate,:PlannedHours,:Salary,:YearDeduct)");
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

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionInsert()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionInsert(:TransactionTypeID,:TransactionNumber,:TransactionDT,:BudgetCategoryID,:Amount,:Description,:Note)");
			$statement->bindParam(':TransactionTypeID', $this->TransactionTypeID, PDO::PARAM_INT);
			$statement->bindParam(':TransactionNumber', $this->TransactionNumber, PDO::PARAM_STR);
			$statement->bindParam(':TransactionDT', $this->TransactionDT, PDO::PARAM_STR);
			$statement->bindParam(':BudgetCategoryID', $this->BudgetCategoryID, PDO::PARAM_INT);
			$statement->bindParam(':Amount', $this->Amount, PDO::PARAM_STR);
			$statement->bindParam(':Description', $this->Description, PDO::PARAM_STR);
			$statement->bindParam(':Note', $this->Note, PDO::PARAM_STR);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionQueueInsert()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionQueueInsert(:QueueID,:TransactionTypeID,:TransactionNumber,:TransactionDT,:BudgetCategoryID,:Amount,:Description,:Note)");
			$statement->bindParam(':QueueID', $this->QueueID, PDO::PARAM_STR);
			$statement->bindParam(':TransactionTypeID', $this->TransactionTypeID, PDO::PARAM_INT);
			$statement->bindParam(':TransactionNumber', $this->TransactionNumber, PDO::PARAM_STR);
			$statement->bindParam(':TransactionDT', $this->TransactionDT, PDO::PARAM_STR);
			$statement->bindParam(':BudgetCategoryID', $this->BudgetCategoryID, PDO::PARAM_INT);
			$statement->bindParam(':Amount', $this->Amount, PDO::PARAM_STR);
			$statement->bindParam(':Description', $this->Description, PDO::PARAM_STR);
			$statement->bindParam(':Note', $this->Note, PDO::PARAM_STR);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionQueueProcess()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionQueueProcess()");
			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionUpdate()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionUpdate(:TransactionID,:TransactionNumber,:TransactionDT,:BudgetID,:BudgetCategoryID,:Amount,:Description,:Note)");
			$statement->bindParam(':TransactionID', $this->TransactionID, PDO::PARAM_INT);
			$statement->bindParam(':TransactionNumber', $this->TransactionNumber, PDO::PARAM_STR);
			$statement->bindParam(':TransactionDT', $this->TransactionDT, PDO::PARAM_STR);
			$statement->bindParam(':BudgetID', $this->BudgetID, PDO::PARAM_INT);
			$statement->bindParam(':BudgetCategoryID', $this->BudgetCategoryID, PDO::PARAM_INT);
			$statement->bindParam(':Amount', $this->Amount, PDO::PARAM_STR);
			$statement->bindParam(':Description', $this->Description, PDO::PARAM_STR);
			$statement->bindParam(':Note', $this->Note, PDO::PARAM_STR);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeUpdate()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetIncomeUpdate(:BudgetIncomeID,:BudgetNumber,:IncomeName,:IncomeTypeID,:IncomeType,:PayCycleID,:PayCycle,:TakeHomePay,:HourlyRate,:PlannedHours,:Salary,:YearDeduct)");
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

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseUpdate()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetExpenseUpdate(:BudgetItemID,:BudgetNumber,:Amount,:BudgetGroupID,:BudgetGroup,:BudgetCategoryID,:BudgetCategory,:Description,:Note,:IsEssential,:HasSpotlight,:HasFundFlg,:FundID,:FundName,:StartingBalance)");
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
			$statement->bindParam(':HasFundFlg', $this->HasFundFlg, PDO::PARAM_STR);
			$statement->bindParam(':FundID', $this->FundID, PDO::PARAM_INT);
			$statement->bindParam(':FundName', $this->FundName, PDO::PARAM_STR);
			$statement->bindParam(':StartingBalance', $this->StartingBalance, PDO::PARAM_STR);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function TransactionDelete()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL TransactionDelete(:TransactionID)");
			$statement->bindParam(':TransactionID', $this->TransactionID, PDO::PARAM_INT);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetByMonthDelete()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetByMonthDelete(:BudgetNumber)");
			$statement->bindParam(':BudgetNumber', $this->BudgetNumber, PDO::PARAM_INT);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetIncomeDelete()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetIncomeDelete(:BudgetIncomeID)");
			$statement->bindParam(':BudgetIncomeID', $this->BudgetIncomeID, PDO::PARAM_INT);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function BudgetExpenseDelete()
	{
		try {
			$database = new Database();
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $database->prepare("CALL BudgetExpenseDelete(:BudgetItemID)");
			$statement->bindParam(':BudgetItemID', $this->BudgetItemID, PDO::PARAM_INT);

			$statement->execute();

			$count = $statement->rowCount();

			$database = null;

			return $count;
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}
}
