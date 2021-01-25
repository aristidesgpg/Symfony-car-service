<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing AccountingTransactionPushRequestType.
 *
 * XSD Type: AccountingTransactionPushRequest
 */
class AccountingTransactionPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionAttributesType
     */
    private $accountingAttributes = null;

    /**
     * Gets as accountingAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionAttributesType
     */
    public function getAccountingAttributes()
    {
        return $this->accountingAttributes;
    }

    /**
     * Sets a new accountingAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionAttributesType $accountingAttributes
     *
     * @return self
     */
    public function setAccountingAttributes(AccountingTransactionAttributesType $accountingAttributes)
    {
        $this->accountingAttributes = $accountingAttributes;

        return $this;
    }
}
