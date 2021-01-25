<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfJobTechnicianType.
 *
 * XSD Type: ArrayOfJobTechnician
 */
class ArrayOfJobTechnicianType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[]
     */
    private $jobTechnician = [
    ];

    /**
     * Adds as jobTechnician.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType $jobTechnician
     */
    public function addToJobTechnician(JobTechnicianType $jobTechnician)
    {
        $this->jobTechnician[] = $jobTechnician;

        return $this;
    }

    /**
     * isset jobTechnician.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetJobTechnician($index)
    {
        return isset($this->jobTechnician[$index]);
    }

    /**
     * unset jobTechnician.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetJobTechnician($index)
    {
        unset($this->jobTechnician[$index]);
    }

    /**
     * Gets as jobTechnician.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[]
     */
    public function getJobTechnician()
    {
        return $this->jobTechnician;
    }

    /**
     * Sets a new jobTechnician.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[] $jobTechnician
     *
     * @return self
     */
    public function setJobTechnician(array $jobTechnician)
    {
        $this->jobTechnician = $jobTechnician;

        return $this;
    }
}
