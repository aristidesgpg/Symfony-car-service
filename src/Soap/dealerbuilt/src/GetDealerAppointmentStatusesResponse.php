<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDealerAppointmentStatusesResponse.
 */
class GetDealerAppointmentStatusesResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType[]
     */
    private $getDealerAppointmentStatusesResult = null;

    /**
     * Adds as dealerAppointmentStatusList.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType $dealerAppointmentStatusList
     */
    public function addToGetDealerAppointmentStatusesResult(BaseApi\DealerAppointmentStatusListType $dealerAppointmentStatusList)
    {
        $this->getDealerAppointmentStatusesResult[] = $dealerAppointmentStatusList;

        return $this;
    }

    /**
     * isset getDealerAppointmentStatusesResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetDealerAppointmentStatusesResult($index)
    {
        return isset($this->getDealerAppointmentStatusesResult[$index]);
    }

    /**
     * unset getDealerAppointmentStatusesResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetDealerAppointmentStatusesResult($index)
    {
        unset($this->getDealerAppointmentStatusesResult[$index]);
    }

    /**
     * Gets as getDealerAppointmentStatusesResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType[]
     */
    public function getGetDealerAppointmentStatusesResult()
    {
        return $this->getDealerAppointmentStatusesResult;
    }

    /**
     * Sets a new getDealerAppointmentStatusesResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType[] $getDealerAppointmentStatusesResult
     *
     * @return self
     */
    public function setGetDealerAppointmentStatusesResult(array $getDealerAppointmentStatusesResult)
    {
        $this->getDealerAppointmentStatusesResult = $getDealerAppointmentStatusesResult;

        return $this;
    }
}
