<?php

namespace App\Soap\automate\src;

/**
 * Class representing ServiceLabor
 */
class ServiceLabor
{

    /**
     * @var int $laborOperationIdTypeCode
     */
    private $laborOperationIdTypeCode = null;

    /**
     * @var float $laborAdditionalHoursNumeric
     */
    private $laborAdditionalHoursNumeric = null;

    /**
     * @var \App\Soap\automate\src\Sublet $sublet
     */
    private $sublet = null;

    /**
     * Gets as laborOperationIdTypeCode
     *
     * @return int
     */
    public function getLaborOperationIdTypeCode()
    {
        return $this->laborOperationIdTypeCode;
    }

    /**
     * Sets a new laborOperationIdTypeCode
     *
     * @param int $laborOperationIdTypeCode
     * @return self
     */
    public function setLaborOperationIdTypeCode($laborOperationIdTypeCode)
    {
        $this->laborOperationIdTypeCode = $laborOperationIdTypeCode;
        return $this;
    }

    /**
     * Gets as laborAdditionalHoursNumeric
     *
     * @return float
     */
    public function getLaborAdditionalHoursNumeric()
    {
        return $this->laborAdditionalHoursNumeric;
    }

    /**
     * Sets a new laborAdditionalHoursNumeric
     *
     * @param float $laborAdditionalHoursNumeric
     * @return self
     */
    public function setLaborAdditionalHoursNumeric($laborAdditionalHoursNumeric)
    {
        $this->laborAdditionalHoursNumeric = $laborAdditionalHoursNumeric;
        return $this;
    }

    /**
     * Gets as sublet
     *
     * @return \App\Soap\automate\src\Sublet
     */
    public function getSublet()
    {
        return $this->sublet;
    }

    /**
     * Sets a new sublet
     *
     * @param \App\Soap\automate\src\Sublet $sublet
     * @return self
     */
    public function setSublet(\App\Soap\automate\src\Sublet $sublet)
    {
        $this->sublet = $sublet;
        return $this;
    }


}

