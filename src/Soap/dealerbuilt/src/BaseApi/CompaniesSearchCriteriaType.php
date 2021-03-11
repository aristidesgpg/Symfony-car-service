<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CompaniesSearchCriteriaType
 *
 * 
 * XSD Type: CompaniesSearchCriteria
 */
class CompaniesSearchCriteriaType
{

    /**
     * @var int[] $companyIds
     */
    private $companyIds = null;

    /**
     * Adds as long
     *
     * @return self
     * @param int $long
     */
    public function addToCompanyIds($long)
    {
        $this->companyIds[] = $long;
        return $this;
    }

    /**
     * isset companyIds
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCompanyIds($index)
    {
        return isset($this->companyIds[$index]);
    }

    /**
     * unset companyIds
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCompanyIds($index)
    {
        unset($this->companyIds[$index]);
    }

    /**
     * Gets as companyIds
     *
     * @return int[]
     */
    public function getCompanyIds()
    {
        return $this->companyIds;
    }

    /**
     * Sets a new companyIds
     *
     * @param int[] $companyIds
     * @return self
     */
    public function setCompanyIds(array $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }


}

