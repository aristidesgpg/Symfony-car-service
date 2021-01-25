<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderSummaryType.
 *
 * XSD Type: RepairOrderSummary
 */
class RepairOrderSummaryType extends ApiServiceLocationItemType
{
    /**
     * @var \DateTime
     */
    private $modifiedStamp = null;

    /**
     * @var string
     */
    private $rOKey = null;

    /**
     * @var string
     */
    private $repairOrderNumber = null;

    /**
     * Gets as modifiedStamp.
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp.
     *
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;

        return $this;
    }

    /**
     * Gets as rOKey.
     *
     * @return string
     */
    public function getROKey()
    {
        return $this->rOKey;
    }

    /**
     * Sets a new rOKey.
     *
     * @param string $rOKey
     *
     * @return self
     */
    public function setROKey($rOKey)
    {
        $this->rOKey = $rOKey;

        return $this;
    }

    /**
     * Gets as repairOrderNumber.
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber.
     *
     * @param string $repairOrderNumber
     *
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;

        return $this;
    }
}
