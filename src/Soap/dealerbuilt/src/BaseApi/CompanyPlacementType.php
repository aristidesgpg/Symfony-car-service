<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CompanyPlacementType.
 *
 * XSD Type: CompanyPlacement
 */
class CompanyPlacementType extends SourcePlacementType
{
    /**
     * @var int
     */
    private $companyId = null;

    /**
     * @var string
     */
    private $companyName = null;

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

    /**
     * Gets as companyName.
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Sets a new companyName.
     *
     * @param string $companyName
     *
     * @return self
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }
}
