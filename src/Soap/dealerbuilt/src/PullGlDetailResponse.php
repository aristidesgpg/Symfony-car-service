<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullGlDetailResponse.
 */
class PullGlDetailResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType[]
     */
    private $pullGlDetailResult = null;

    /**
     * Adds as glDetailItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType $glDetailItem
     */
    public function addToPullGlDetailResult(BaseApi\GlDetailItemType $glDetailItem)
    {
        $this->pullGlDetailResult[] = $glDetailItem;

        return $this;
    }

    /**
     * isset pullGlDetailResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullGlDetailResult($index)
    {
        return isset($this->pullGlDetailResult[$index]);
    }

    /**
     * unset pullGlDetailResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullGlDetailResult($index)
    {
        unset($this->pullGlDetailResult[$index]);
    }

    /**
     * Gets as pullGlDetailResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType[]
     */
    public function getPullGlDetailResult()
    {
        return $this->pullGlDetailResult;
    }

    /**
     * Sets a new pullGlDetailResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType[] $pullGlDetailResult
     *
     * @return self
     */
    public function setPullGlDetailResult(array $pullGlDetailResult)
    {
        $this->pullGlDetailResult = $pullGlDetailResult;

        return $this;
    }
}
