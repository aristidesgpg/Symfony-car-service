<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetLenderByCode.
 */
class GetLenderByCode
{
    /**
     * @var int
     */
    private $sourceId = null;

    /**
     * @var string
     */
    private $lenderCode = null;

    /**
     * Gets as sourceId.
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets a new sourceId.
     *
     * @param int $sourceId
     *
     * @return self
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    /**
     * Gets as lenderCode.
     *
     * @return string
     */
    public function getLenderCode()
    {
        return $this->lenderCode;
    }

    /**
     * Sets a new lenderCode.
     *
     * @param string $lenderCode
     *
     * @return self
     */
    public function setLenderCode($lenderCode)
    {
        $this->lenderCode = $lenderCode;

        return $this;
    }
}
