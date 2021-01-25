<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing SourcesSearchCriteriaType.
 *
 * XSD Type: SourcesSearchCriteria
 */
class SourcesSearchCriteriaType extends SearchCriteriaType
{
    /**
     * @var int[]
     */
    private $sourceIds = null;

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToSourceIds($long)
    {
        $this->sourceIds[] = $long;

        return $this;
    }

    /**
     * isset sourceIds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSourceIds($index)
    {
        return isset($this->sourceIds[$index]);
    }

    /**
     * unset sourceIds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSourceIds($index)
    {
        unset($this->sourceIds[$index]);
    }

    /**
     * Gets as sourceIds.
     *
     * @return int[]
     */
    public function getSourceIds()
    {
        return $this->sourceIds;
    }

    /**
     * Sets a new sourceIds.
     *
     * @param int[] $sourceIds
     *
     * @return self
     */
    public function setSourceIds(array $sourceIds)
    {
        $this->sourceIds = $sourceIds;

        return $this;
    }
}
