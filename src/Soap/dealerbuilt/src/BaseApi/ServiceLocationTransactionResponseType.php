<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationTransactionResponseType
 *
 * 
 * XSD Type: ServiceLocationTransactionResponse
 */
class ServiceLocationTransactionResponseType extends TransactionResponseType
{

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }


}

