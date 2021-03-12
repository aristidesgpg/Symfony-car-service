<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDivisions
 */
class GetDivisions
{

    /**
     * @var int $companyId
     */
    private $companyId = null;

    /**
     * Gets as companyId
     *
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Sets a new companyId
     *
     * @param int $companyId
     * @return self
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }


}

