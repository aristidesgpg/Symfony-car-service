<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetServicePersonsResponse
 */
class GetServicePersonsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getServicePersonsResult
     */
    private $getServicePersonsResult = null;

    /**
     * Gets as getServicePersonsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType
     */
    public function getGetServicePersonsResult()
    {
        return $this->getServicePersonsResult;
    }

    /**
     * Sets a new getServicePersonsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getServicePersonsResult
     * @return self
     */
    public function setGetServicePersonsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getServicePersonsResult)
    {
        $this->getServicePersonsResult = $getServicePersonsResult;
        return $this;
    }


}

