<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullGlSummaryResponse
 */
class PullGlSummaryResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType[] $pullGlSummaryResult
     */
    private $pullGlSummaryResult = null;

    /**
     * Adds as glSummaryItem
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType $glSummaryItem
     */
    public function addToPullGlSummaryResult(\App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType $glSummaryItem)
    {
        $this->pullGlSummaryResult[] = $glSummaryItem;
        return $this;
    }

    /**
     * isset pullGlSummaryResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullGlSummaryResult($index)
    {
        return isset($this->pullGlSummaryResult[$index]);
    }

    /**
     * unset pullGlSummaryResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullGlSummaryResult($index)
    {
        unset($this->pullGlSummaryResult[$index]);
    }

    /**
     * Gets as pullGlSummaryResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType[]
     */
    public function getPullGlSummaryResult()
    {
        return $this->pullGlSummaryResult;
    }

    /**
     * Sets a new pullGlSummaryResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType[] $pullGlSummaryResult
     * @return self
     */
    public function setPullGlSummaryResult(array $pullGlSummaryResult)
    {
        $this->pullGlSummaryResult = $pullGlSummaryResult;
        return $this;
    }


}

