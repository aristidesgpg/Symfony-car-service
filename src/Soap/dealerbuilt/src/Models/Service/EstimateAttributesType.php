<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing EstimateAttributesType
 *
 * 
 * XSD Type: EstimateAttributes
 */
class EstimateAttributesType extends RecordAttributesType
{

    /**
     * @var string $estimateNumber
     */
    private $estimateNumber = null;

    /**
     * @var string $repairOrderNumber
     */
    private $repairOrderNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor
     */
    private $serviceAdvisor = null;

    /**
     * Gets as estimateNumber
     *
     * @return string
     */
    public function getEstimateNumber()
    {
        return $this->estimateNumber;
    }

    /**
     * Sets a new estimateNumber
     *
     * @param string $estimateNumber
     * @return self
     */
    public function setEstimateNumber($estimateNumber)
    {
        $this->estimateNumber = $estimateNumber;
        return $this;
    }

    /**
     * Gets as repairOrderNumber
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber
     *
     * @param string $repairOrderNumber
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;
        return $this;
    }

    /**
     * Gets as serviceAdvisor
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getServiceAdvisor()
    {
        return $this->serviceAdvisor;
    }

    /**
     * Sets a new serviceAdvisor
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor
     * @return self
     */
    public function setServiceAdvisor(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor)
    {
        $this->serviceAdvisor = $serviceAdvisor;
        return $this;
    }


}

