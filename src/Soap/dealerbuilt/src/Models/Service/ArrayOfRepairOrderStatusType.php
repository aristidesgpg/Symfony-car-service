<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfRepairOrderStatusType.
 *
 * XSD Type: ArrayOfRepairOrderStatus
 */
class ArrayOfRepairOrderStatusType
{
    /**
     * @var string[]
     */
    private $repairOrderStatus = [
    ];

    /**
     * Adds as repairOrderStatus.
     *
     * @return self
     *
     * @param string $repairOrderStatus
     */
    public function addToRepairOrderStatus($repairOrderStatus)
    {
        $this->repairOrderStatus[] = $repairOrderStatus;

        return $this;
    }

    /**
     * isset repairOrderStatus.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderStatus($index)
    {
        return isset($this->repairOrderStatus[$index]);
    }

    /**
     * unset repairOrderStatus.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderStatus($index)
    {
        unset($this->repairOrderStatus[$index]);
    }

    /**
     * Gets as repairOrderStatus.
     *
     * @return string[]
     */
    public function getRepairOrderStatus()
    {
        return $this->repairOrderStatus;
    }

    /**
     * Sets a new repairOrderStatus.
     *
     * @param string $repairOrderStatus
     *
     * @return self
     */
    public function setRepairOrderStatus(array $repairOrderStatus)
    {
        $this->repairOrderStatus = $repairOrderStatus;

        return $this;
    }
}
