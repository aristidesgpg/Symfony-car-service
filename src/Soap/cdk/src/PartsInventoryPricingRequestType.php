<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingRequestType
 *
 * 
 * XSD Type: partsInventoryPricingRequest
 */
class PartsInventoryPricingRequestType
{

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingRecordType[] $records
     */
    private $records = [
        
    ];

    /**
     * @var bool $supersession
     */
    private $supersession = null;

    /**
     * Adds as records
     *
     * @return self
     * @param \App\Soap\cdk\src\PartsInventoryPricingRecordType $records
     */
    public function addToRecords(\App\Soap\cdk\src\PartsInventoryPricingRecordType $records)
    {
        $this->records[] = $records;
        return $this;
    }

    /**
     * isset records
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRecords($index)
    {
        return isset($this->records[$index]);
    }

    /**
     * unset records
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRecords($index)
    {
        unset($this->records[$index]);
    }

    /**
     * Gets as records
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingRecordType[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * Sets a new records
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingRecordType[] $records
     * @return self
     */
    public function setRecords(array $records)
    {
        $this->records = $records;
        return $this;
    }

    /**
     * Gets as supersession
     *
     * @return bool
     */
    public function getSupersession()
    {
        return $this->supersession;
    }

    /**
     * Sets a new supersession
     *
     * @param bool $supersession
     * @return self
     */
    public function setSupersession($supersession)
    {
        $this->supersession = $supersession;
        return $this;
    }


}

