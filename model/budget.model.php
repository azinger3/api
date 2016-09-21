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

  // Transaction
  private $TransactionTypeID;
  private $TransactionNumber;
  private $TransactionDT;

  // General
  private $Keyword;
  private $StartDT;
  private $EndDT;

  // Audit
  private $CreateDT;
  private $CreateBy;
  private $ModifyDT;
  private $ModifyBy;
  private $ActiveFlg;
}
