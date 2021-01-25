<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfRepairOrderPartType.
 *
 * XSD Type: ArrayOfRepairOrderPart
 */
class ArrayOfRepairOrderPartType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType[]
     */
    private $repairOrderPart = [
    ];

    /**
     * Adds as repairOrderPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType $repairOrderPart
     */
    public function addToRepairOrderPart(RepairOrderPartType $repairOrderPart)
    {
        $this->repairOrderPart[] = $repairOrderPart;

        return $this;
    }

    /**
     * isset repairOrderPart.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderPart($index)
    {
        return isset($this->repairOrderPart[$index]);
    }

    /**
     * unset repairOrderPart.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderPart($index)
    {
        unset($this->repairOrderPart[$index]);
    }

    /**
     * Gets as repairOrderPart.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType[]
     */
    public function getRepairOrderPart()
    {
        return $this->repairOrderPart;
    }

    /**
     * Sets a new repairOrderPart.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType[] $repairOrderPart
     *
     * @return self
     */
    public function setRepairOrderPart(array $repairOrderPart)
    {
        $this->repairOrderPart = $repairOrderPart;

        return $this;
    }
}
