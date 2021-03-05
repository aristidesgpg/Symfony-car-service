<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullProspectsResponse
 */
class PullProspectsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProspectType[] $pullProspectsResult
     */
    private $pullProspectsResult = null;

    /**
     * Adds as prospect
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectType $prospect
     */
    public function addToPullProspectsResult(\App\Soap\dealerbuilt\src\BaseApi\ProspectType $prospect)
    {
        $this->pullProspectsResult[] = $prospect;
        return $this;
    }

    /**
     * isset pullProspectsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullProspectsResult($index)
    {
        return isset($this->pullProspectsResult[$index]);
    }

    /**
     * unset pullProspectsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullProspectsResult($index)
    {
        unset($this->pullProspectsResult[$index]);
    }

    /**
     * Gets as pullProspectsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProspectType[]
     */
    public function getPullProspectsResult()
    {
        return $this->pullProspectsResult;
    }

    /**
     * Sets a new pullProspectsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectType[] $pullProspectsResult
     * @return self
     */
    public function setPullProspectsResult(array $pullProspectsResult)
    {
        $this->pullProspectsResult = $pullProspectsResult;
        return $this;
    }


}

