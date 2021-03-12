<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DivisionType
 *
 * 
 * XSD Type: Division
 */
class DivisionType extends ApiCompanyItemType
{

    /**
     * @var int $balanceSheetDivision
     */
    private $balanceSheetDivision = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var int $divsionNumber
     */
    private $divsionNumber = null;

    /**
     * @var int $retainedEarningsDivision
     */
    private $retainedEarningsDivision = null;

    /**
     * Gets as balanceSheetDivision
     *
     * @return int
     */
    public function getBalanceSheetDivision()
    {
        return $this->balanceSheetDivision;
    }

    /**
     * Sets a new balanceSheetDivision
     *
     * @param int $balanceSheetDivision
     * @return self
     */
    public function setBalanceSheetDivision($balanceSheetDivision)
    {
        $this->balanceSheetDivision = $balanceSheetDivision;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as divsionNumber
     *
     * @return int
     */
    public function getDivsionNumber()
    {
        return $this->divsionNumber;
    }

    /**
     * Sets a new divsionNumber
     *
     * @param int $divsionNumber
     * @return self
     */
    public function setDivsionNumber($divsionNumber)
    {
        $this->divsionNumber = $divsionNumber;
        return $this;
    }

    /**
     * Gets as retainedEarningsDivision
     *
     * @return int
     */
    public function getRetainedEarningsDivision()
    {
        return $this->retainedEarningsDivision;
    }

    /**
     * Sets a new retainedEarningsDivision
     *
     * @param int $retainedEarningsDivision
     * @return self
     */
    public function setRetainedEarningsDivision($retainedEarningsDivision)
    {
        $this->retainedEarningsDivision = $retainedEarningsDivision;
        return $this;
    }


}

