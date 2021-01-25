<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetTechniciansResponse.
 */
class GetTechniciansResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType
     */
    private $getTechniciansResult = null;

    /**
     * Gets as getTechniciansResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType
     */
    public function getGetTechniciansResult()
    {
        return $this->getTechniciansResult;
    }

    /**
     * Sets a new getTechniciansResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPersonsType $getTechniciansResult
     *
     * @return self
     */
    public function setGetTechniciansResult(BaseApi\ServiceLocationPersonsType $getTechniciansResult)
    {
        $this->getTechniciansResult = $getTechniciansResult;

        return $this;
    }
}
