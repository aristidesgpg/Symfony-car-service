<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPurchaseOrders
 */
class PullPurchaseOrders
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderSearchCriteriaType $apiSearchCriteria
     */
    private $apiSearchCriteria = null;

    /**
     * Gets as apiSearchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderSearchCriteriaType
     */
    public function getApiSearchCriteria()
    {
        return $this->apiSearchCriteria;
    }

    /**
     * Sets a new apiSearchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderSearchCriteriaType $apiSearchCriteria
     * @return self
     */
    public function setApiSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderSearchCriteriaType $apiSearchCriteria)
    {
        $this->apiSearchCriteria = $apiSearchCriteria;
        return $this;
    }


}

