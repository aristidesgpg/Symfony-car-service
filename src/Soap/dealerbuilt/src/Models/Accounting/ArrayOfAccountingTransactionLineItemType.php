<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing ArrayOfAccountingTransactionLineItemType
 *
 * 
 * XSD Type: ArrayOfAccountingTransactionLineItem
 */
class ArrayOfAccountingTransactionLineItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType[] $accountingTransactionLineItem
     */
    private $accountingTransactionLineItem = [
        
    ];

    /**
     * Adds as accountingTransactionLineItem
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType $accountingTransactionLineItem
     */
    public function addToAccountingTransactionLineItem(\App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType $accountingTransactionLineItem)
    {
        $this->accountingTransactionLineItem[] = $accountingTransactionLineItem;
        return $this;
    }

    /**
     * isset accountingTransactionLineItem
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAccountingTransactionLineItem($index)
    {
        return isset($this->accountingTransactionLineItem[$index]);
    }

    /**
     * unset accountingTransactionLineItem
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAccountingTransactionLineItem($index)
    {
        unset($this->accountingTransactionLineItem[$index]);
    }

    /**
     * Gets as accountingTransactionLineItem
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType[]
     */
    public function getAccountingTransactionLineItem()
    {
        return $this->accountingTransactionLineItem;
    }

    /**
     * Sets a new accountingTransactionLineItem
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType[] $accountingTransactionLineItem
     * @return self
     */
    public function setAccountingTransactionLineItem(array $accountingTransactionLineItem)
    {
        $this->accountingTransactionLineItem = $accountingTransactionLineItem;
        return $this;
    }


}

