<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing SourcePushResponseType.
 *
 * XSD Type: SourcePushResponse
 */
class SourcePushResponseType extends PushResponseType
{
    /**
     * @var int
     */
    private $sourceId = null;

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
}
