<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDealerAppointmentStatusListType.
 *
 * XSD Type: ArrayOfDealerAppointmentStatusList
 */
class ArrayOfDealerAppointmentStatusListType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType[]
     */
    private $dealerAppointmentStatusList = [
    ];

    /**
     * Adds as dealerAppointmentStatusList.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType $dealerAppointmentStatusList
     */
    public function addToDealerAppointmentStatusList(DealerAppointmentStatusListType $dealerAppointmentStatusList)
    {
        $this->dealerAppointmentStatusList[] = $dealerAppointmentStatusList;

        return $this;
    }

    /**
     * isset dealerAppointmentStatusList.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealerAppointmentStatusList($index)
    {
        return isset($this->dealerAppointmentStatusList[$index]);
    }

    /**
     * unset dealerAppointmentStatusList.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealerAppointmentStatusList($index)
    {
        unset($this->dealerAppointmentStatusList[$index]);
    }

    /**
     * Gets as dealerAppointmentStatusList.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType[]
     */
    public function getDealerAppointmentStatusList()
    {
        return $this->dealerAppointmentStatusList;
    }

    /**
     * Sets a new dealerAppointmentStatusList.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealerAppointmentStatusListType[] $dealerAppointmentStatusList
     *
     * @return self
     */
    public function setDealerAppointmentStatusList(array $dealerAppointmentStatusList)
    {
        $this->dealerAppointmentStatusList = $dealerAppointmentStatusList;

        return $this;
    }
}
