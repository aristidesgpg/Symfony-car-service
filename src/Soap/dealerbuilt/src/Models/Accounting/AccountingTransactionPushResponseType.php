<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

use App\Soap\dealerbuilt\src\Models\PushResponseType;

/**
 * Class representing AccountingTransactionPushResponseType.
 *
 * XSD Type: AccountingTransactionPushResponse
 */
class AccountingTransactionPushResponseType extends PushResponseType
{
    /**
     * @var string
     */
    private $transactionNumber = null;

    /**
     * Gets as transactionNumber.
     *
     * @return string
     */
    public function getTransactionNumber()
    {
        return $this->transactionNumber;
    }

    /**
     * Sets a new transactionNumber.
     *
     * @param string $transactionNumber
     *
     * @return self
     */
    public function setTransactionNumber($transactionNumber)
    {
        $this->transactionNumber = $transactionNumber;

        return $this;
    }
}
