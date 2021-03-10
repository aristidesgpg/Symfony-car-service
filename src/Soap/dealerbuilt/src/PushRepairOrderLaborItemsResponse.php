<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderLaborItemsResponse
 */
class PushRepairOrderLaborItemsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[] $pushRepairOrderLaborItemsResult
     */
    private $pushRepairOrderLaborItemsResult = null;

    /**
     * Adds as laborItemPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType $laborItemPushResponse
     */
    public function addToPushRepairOrderLaborItemsResult(\App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType $laborItemPushResponse)
    {
        $this->pushRepairOrderLaborItemsResult[] = $laborItemPushResponse;
        return $this;
    }

    /**
     * isset pushRepairOrderLaborItemsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushRepairOrderLaborItemsResult($index)
    {
        return isset($this->pushRepairOrderLaborItemsResult[$index]);
    }

    /**
     * unset pushRepairOrderLaborItemsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushRepairOrderLaborItemsResult($index)
    {
        unset($this->pushRepairOrderLaborItemsResult[$index]);
    }

    /**
     * Gets as pushRepairOrderLaborItemsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[]
     */
    public function getPushRepairOrderLaborItemsResult()
    {
        return $this->pushRepairOrderLaborItemsResult;
    }

    /**
     * Sets a new pushRepairOrderLaborItemsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[] $pushRepairOrderLaborItemsResult
     * @return self
     */
    public function setPushRepairOrderLaborItemsResult(array $pushRepairOrderLaborItemsResult)
    {
        $this->pushRepairOrderLaborItemsResult = $pushRepairOrderLaborItemsResult;
        return $this;
    }


}

