<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetLenders
 */
class GetLenders
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ApiLenderSearchCriteriaType $type
     */
    private $type = null;

    /**
     * Gets as type
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ApiLenderSearchCriteriaType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiLenderSearchCriteriaType $type
     * @return self
     */
    public function setType(\App\Soap\dealerbuilt\src\BaseApi\ApiLenderSearchCriteriaType $type)
    {
        $this->type = $type;
        return $this;
    }


}

