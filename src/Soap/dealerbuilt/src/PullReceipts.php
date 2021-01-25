<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullReceipts.
 */
class PullReceipts
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ReceiptSearchCriteriaType
     */
    private $apiSearchCriteria = null;

    /**
     * Gets as apiSearchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ReceiptSearchCriteriaType
     */
    public function getApiSearchCriteria()
    {
        return $this->apiSearchCriteria;
    }

    /**
     * Sets a new apiSearchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ReceiptSearchCriteriaType $apiSearchCriteria
     *
     * @return self
     */
    public function setApiSearchCriteria(BaseApi\ReceiptSearchCriteriaType $apiSearchCriteria)
    {
        $this->apiSearchCriteria = $apiSearchCriteria;

        return $this;
    }
}
