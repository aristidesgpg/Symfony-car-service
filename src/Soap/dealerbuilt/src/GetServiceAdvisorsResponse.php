<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetServiceAdvisorsResponse.
 */
class GetServiceAdvisorsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType
     */
    private $getServiceAdvisorsResult = null;

    /**
     * Gets as getServiceAdvisorsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType
     */
    public function getGetServiceAdvisorsResult()
    {
        return $this->getServiceAdvisorsResult;
    }

    /**
     * Sets a new getServiceAdvisorsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getServiceAdvisorsResult
     *
     * @return self
     */
    public function setGetServiceAdvisorsResult(BaseApi\ServiceLocationPersonsType $getServiceAdvisorsResult)
    {
        $this->getServiceAdvisorsResult = $getServiceAdvisorsResult;

        return $this;
    }
}
