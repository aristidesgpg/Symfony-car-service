<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetPartsCounterEmployeesResponse
 */
class GetPartsCounterEmployeesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getPartsCounterEmployeesResult
     */
    private $getPartsCounterEmployeesResult = null;

    /**
     * Gets as getPartsCounterEmployeesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType
     */
    public function getGetPartsCounterEmployeesResult()
    {
        return $this->getPartsCounterEmployeesResult;
    }

    /**
     * Sets a new getPartsCounterEmployeesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getPartsCounterEmployeesResult
     * @return self
     */
    public function setGetPartsCounterEmployeesResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getPartsCounterEmployeesResult)
    {
        $this->getPartsCounterEmployeesResult = $getPartsCounterEmployeesResult;
        return $this;
    }


}

