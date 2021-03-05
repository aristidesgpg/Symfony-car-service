<?php

namespace App\Soap\automate\src;

/**
 * Class representing RepairOrder
 */
class RepairOrder
{

    /**
     * @var \App\Soap\automate\src\RepairOrderHeader $repairOrderHeader
     */
    private $repairOrderHeader = null;

    /**
     * @var \App\Soap\automate\src\Job[] $job
     */
    private $job = [
        
    ];

    /**
     * Gets as repairOrderHeader
     *
     * @return \App\Soap\automate\src\RepairOrderHeader
     */
    public function getRepairOrderHeader()
    {
        return $this->repairOrderHeader;
    }

    /**
     * Sets a new repairOrderHeader
     *
     * @param \App\Soap\automate\src\RepairOrderHeader $repairOrderHeader
     * @return self
     */
    public function setRepairOrderHeader(\App\Soap\automate\src\RepairOrderHeader $repairOrderHeader)
    {
        $this->repairOrderHeader = $repairOrderHeader;
        return $this;
    }

    /**
     * Adds as job
     *
     * @return self
     * @param \App\Soap\automate\src\Job $job
     */
    public function addToJob(\App\Soap\automate\src\Job $job)
    {
        $this->job[] = $job;
        return $this;
    }

    /**
     * isset job
     *
     * @param int|string $index
     * @return bool
     */
    public function issetJob($index)
    {
        return isset($this->job[$index]);
    }

    /**
     * unset job
     *
     * @param int|string $index
     * @return void
     */
    public function unsetJob($index)
    {
        unset($this->job[$index]);
    }

    /**
     * Gets as job
     *
     * @return \App\Soap\automate\src\Job[]
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Sets a new job
     *
     * @param \App\Soap\automate\src\Job[] $job
     * @return self
     */
    public function setJob(array $job)
    {
        $this->job = $job;
        return $this;
    }


}

