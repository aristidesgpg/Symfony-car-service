<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StorePushResponseType.
 *
 * XSD Type: StorePushResponse
 */
class StorePushResponseType extends PushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealType
     */
    private $pushedDeal = null;

    /**
     * @var int
     */
    private $storeId = null;

    /**
     * Gets as pushedDeal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealType
     */
    public function getPushedDeal()
    {
        return $this->pushedDeal;
    }

    /**
     * Sets a new pushedDeal.
     *
     * @return self
     */
    public function setPushedDeal(\App\Soap\dealerbuilt\src\Models\Sales\DealType $pushedDeal)
    {
        $this->pushedDeal = $pushedDeal;

        return $this;
    }

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }
}
