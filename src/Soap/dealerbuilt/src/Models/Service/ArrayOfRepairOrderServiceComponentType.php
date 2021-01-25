<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfRepairOrderServiceComponentType.
 *
 * XSD Type: ArrayOfRepairOrderServiceComponent
 */
class ArrayOfRepairOrderServiceComponentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType[]
     */
    private $repairOrderServiceComponent = [
    ];

    /**
     * Adds as repairOrderServiceComponent.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType $repairOrderServiceComponent
     */
    public function addToRepairOrderServiceComponent(RepairOrderServiceComponentType $repairOrderServiceComponent)
    {
        $this->repairOrderServiceComponent[] = $repairOrderServiceComponent;

        return $this;
    }

    /**
     * isset repairOrderServiceComponent.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderServiceComponent($index)
    {
        return isset($this->repairOrderServiceComponent[$index]);
    }

    /**
     * unset repairOrderServiceComponent.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderServiceComponent($index)
    {
        unset($this->repairOrderServiceComponent[$index]);
    }

    /**
     * Gets as repairOrderServiceComponent.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType[]
     */
    public function getRepairOrderServiceComponent()
    {
        return $this->repairOrderServiceComponent;
    }

    /**
     * Sets a new repairOrderServiceComponent.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType[] $repairOrderServiceComponent
     *
     * @return self
     */
    public function setRepairOrderServiceComponent(array $repairOrderServiceComponent)
    {
        $this->repairOrderServiceComponent = $repairOrderServiceComponent;

        return $this;
    }
}
