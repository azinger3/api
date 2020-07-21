<?php

class BudgetModel
{
	// Budget
	private $BudgetID;
	private $BudgetNumber;
	private $BudgetMonth;
	private $BudgetGroupID;
	private $BudgetGroup;
	private $BudgetCategoryID;
	private $BudgetCategory;
	private $Description;
	private $Note;
	private $IsEssential;
	private $HasSpotlight;
	private $ColorHighlight;
	private $BudgetTypeID;
	private $BudgetType;
	private $BudgetItemID;
	private $Amount;
	private $FundID;
	private $Sort;

	// Budget Income
	private $BudgetIncomeID;
	private $IncomeName;
	private $IncomeTypeID;
	private $IncomeType;
	private $PayCycleID;
	private $PayCycle;
	private $TakeHomePay;
	private $HourlyRate;
	private $PlannedHours;
	private $Salary;
	private $YearDeduct;

	// Budget Expense
	private $HasFundFlg;
	private $FundName;
	private $StartingBalance;

	// Transaction
	private $TransactionTypeID;
	private $TransactionNumber;
	private $TransactionDT;
	private $QueueID;

	// General
	private $Keyword;
	private $StartDT;
	private $EndDT;
	private $EffectiveDT;

	// Audit
	private $CreateDT;
	private $CreateBy;
	private $ModifyDT;
	private $ModifyBy;
	private $ActiveFlg;

	// SMS
	private $Sender;
	private $Receiver;
	private $Body;
	private $SmsSid;
	private $SmsMessageSid;
	private $SmsStatus;
	private $AccountSid;
	private $MessageSid;
	private $FromCity;
	private $FromState;
	private $FromZip;
	private $FromCountry;
	private $ToState;
	private $ToCity;
	private $ToZip;
	private $ToCountry;
	private $NumMedia;
	private $NumSegments;
	private $ApiVersion;
}
