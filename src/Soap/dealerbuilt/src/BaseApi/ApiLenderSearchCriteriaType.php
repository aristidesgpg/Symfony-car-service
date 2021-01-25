<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiLenderSearchCriteriaType
 *
 * 
 * XSD Type: ApiLenderSearchCriteria
 */
class ApiLenderSearchCriteriaType
{

    /**
     * @var string $lenderType
     */
    private $lenderType = null;

    /**
     * @var \DateInterval $maxElapsedSinceUpdate
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * @var int $sourceId
     */
    private $sourceId = null;

    /**
     * Gets as lenderType
     *
     * @return string
     */
    public function getLenderType()
    {
        return $this->lenderType;
    }

    /**
     * Sets a new lenderType
     *
     * @param string $lenderType
     * @return self
     */
    public function setLenderType($lenderType)
    {
        $this->lenderType = $lenderType;
        return $this;
    }

    /**
     * Gets as maxElapsedSinceUpdate
     *
     * @return \DateInterval
     */
    public function getMaxElapsedSinceUpdate()
    {
        return $this->maxElapsedSinceUpdate;
    }

    /**
     * Sets a new maxElapsedSinceUpdate
     *
     * @param \DateInterval $maxElapsedSinceUpdate
     * @return self
     */
    public function setMaxElapsedSinceUpdate(\DateInterval $maxElapsedSinceUpdate)
    {
        $this->maxElapsedSinceUpdate = $maxElapsedSinceUpdate;
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

