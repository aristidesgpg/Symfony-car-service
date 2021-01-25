<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RepairOrderPayTypeBreakdownType
 *
 * 
 * XSD Type: RepairOrderPayTypeBreakdown
 */
class RepairOrderPayTypeBreakdownType
{

    /**
     * @var \DateTime $closedDate
     */
    private $closedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $freight
     */
    private $freight = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $hazmat
     */
    private $hazmat = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $labor
     */
    private $labor = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $misc
     */
    private $misc = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $parts
     */
    private $parts = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $sublet
     */
    private $sublet = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxesFees
     */
    private $taxesFees = null;

    /**
     * Gets as closedDate
     *
     * @return \DateTime
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * Sets a new closedDate
     *
     * @param \DateTime $closedDate
     * @return self
     */
    public function setClosedDate(\DateTime $closedDate = null)
    {
        $this->closedDate = $closedDate;
        return $this;
    }

    /**
     * Gets as freight
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * Sets a new freight
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $freight
     * @return self
     */
    public function setFreight(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $freight)
    {
        $this->freight = $freight;
        return $this;
    }

    /**
     * Gets as hazmat
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getHazmat()
    {
        return $this->hazmat;
    }

    /**
     * Sets a new hazmat
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $hazmat
     * @return self
     */
    public function setHazmat(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $hazmat)
    {
        $this->hazmat = $hazmat;
        return $this;
    }

    /**
     * Gets as labor
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLabor()
    {
        return $this->labor;
    }

    /**
     * Sets a new labor
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $labor
     * @return self
     */
    public function setLabor(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $labor)
    {
        $this->labor = $labor;
        return $this;
    }

    /**
     * Gets as misc
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * Sets a new misc
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $misc
     * @return self
     */
    public function setMisc(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $misc)
    {
        $this->misc = $misc;
        return $this;
    }

    /**
     * Gets as parts
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $parts
     * @return self
     */
    public function setParts(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $parts)
    {
        $this->parts = $parts;
        return $this;
    }

    /**
     * Gets as sublet
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSublet()
    {
        return $this->sublet;
    }

    /**
     * Sets a new sublet
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $sublet
     * @return self
     */
    public function setSublet(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $sublet)
    {
        $this->sublet = $sublet;
        return $this;
    }

    /**
     * Gets as taxesFees
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxesFees()
    {
        return $this->taxesFees;
    }

    /**
     * Sets a new taxesFees
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxesFees
     * @return self
     */
    public function setTaxesFees(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxesFees)
    {
        $this->taxesFees = $taxesFees;
        return $this;
    }


}

