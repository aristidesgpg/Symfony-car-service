<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing SourcePlacementType
 *
 * 
 * XSD Type: SourcePlacement
 */
class SourcePlacementType extends EnvironmentPlacementType
{

    /**
     * @var int $dealerId
     */
    private $dealerId = null;

    /**
     * @var int $sourceId
     */
    private $sourceId = null;

    /**
     * Gets as dealerId
     *
     * @return int
     */
    public function getDealerId()
    {
        return $this->dealerId;
    }

    /**
     * Sets a new dealerId
     *
     * @param int $dealerId
     * @return self
     */
    public function setDealerId($dealerId)
    {
        $this->dealerId = $dealerId;
        return $this;
    }

    /**
     * Gets as sourceId
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets a new sourceId
     *
     * @param int $sourceId
     * @return self
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }


}

