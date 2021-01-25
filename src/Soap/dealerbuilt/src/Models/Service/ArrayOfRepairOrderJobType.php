<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfRepairOrderJobType.
 *
 * XSD Type: ArrayOfRepairOrderJob
 */
class ArrayOfRepairOrderJobType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType[]
     */
    private $repairOrderJob = [
    ];

    /**
     * Adds as repairOrderJob.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType $repairOrderJob
     */
    public function addToRepairOrderJob(RepairOrderJobType $repairOrderJob)
    {
        $this->repairOrderJob[] = $repairOrderJob;

        return $this;
    }

    /**
     * isset repairOrderJob.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderJob($index)
    {
        return isset($this->repairOrderJob[$index]);
    }

    /**
     * unset repairOrderJob.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderJob($index)
    {
        unset($this->repairOrderJob[$index]);
    }

    /**
     * Gets as repairOrderJob.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType[]
     */
    public function getRepairOrderJob()
    {
        return $this->repairOrderJob;
    }

    /**
     * Sets a new repairOrderJob.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType[] $repairOrderJob
     *
     * @return self
     */
    public function setRepairOrderJob(array $repairOrderJob)
    {
        $this->repairOrderJob = $repairOrderJob;

        return $this;
    }
}
