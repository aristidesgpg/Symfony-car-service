<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushGeneralJournalAccountingResponse
 */
class PushGeneralJournalAccountingResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushResponseType $pushGeneralJournalAccountingResult
     */
    private $pushGeneralJournalAccountingResult = null;

    /**
     * Gets as pushGeneralJournalAccountingResult
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushResponseType
     */
    public function getPushGeneralJournalAccountingResult()
    {
        return $this->pushGeneralJournalAccountingResult;
    }

    /**
     * Sets a new pushGeneralJournalAccountingResult
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushResponseType $pushGeneralJournalAccountingResult
     * @return self
     */
    public function setPushGeneralJournalAccountingResult(\App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionPushResponseType $pushGeneralJournalAccountingResult)
    {
        $this->pushGeneralJournalAccountingResult = $pushGeneralJournalAccountingResult;
        return $this;
    }


}

