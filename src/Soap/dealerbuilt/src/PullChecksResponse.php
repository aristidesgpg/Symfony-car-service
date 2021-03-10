<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullChecksResponse
 */
class PullChecksResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CheckType[] $pullChecksResult
     */
    private $pullChecksResult = null;

    /**
     * Adds as check
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CheckType $check
     */
    public function addToPullChecksResult(\App\Soap\dealerbuilt\src\BaseApi\CheckType $check)
    {
        $this->pullChecksResult[] = $check;
        return $this;
    }

    /**
     * isset pullChecksResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullChecksResult($index)
    {
        return isset($this->pullChecksResult[$index]);
    }

    /**
     * unset pullChecksResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullChecksResult($index)
    {
        unset($this->pullChecksResult[$index]);
    }

    /**
     * Gets as pullChecksResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CheckType[]
     */
    public function getPullChecksResult()
    {
        return $this->pullChecksResult;
    }

    /**
     * Sets a new pullChecksResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CheckType[] $pullChecksResult
     * @return self
     */
    public function setPullChecksResult(array $pullChecksResult)
    {
        $this->pullChecksResult = $pullChecksResult;
        return $this;
    }


}

