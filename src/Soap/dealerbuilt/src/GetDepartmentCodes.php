<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDepartmentCodes.
 */
class GetDepartmentCodes
{
    /**
     * @var int
     */
    private $companyId = null;

    /**
     * Gets as companyId.
     *
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Sets a new companyId.
     *
     * @param int $companyId
     *
     * @return self
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }
}
