<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullChartResponse
 */
class PullChartResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType[] $pullChartResult
     */
    private $pullChartResult = null;

    /**
     * Adds as chartEntry
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType $chartEntry
     */
    public function addToPullChartResult(\App\Soap\dealerbuilt\src\BaseApi\ChartEntryType $chartEntry)
    {
        $this->pullChartResult[] = $chartEntry;
        return $this;
    }

    /**
     * isset pullChartResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullChartResult($index)
    {
        return isset($this->pullChartResult[$index]);
    }

    /**
     * unset pullChartResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullChartResult($index)
    {
        unset($this->pullChartResult[$index]);
    }

    /**
     * Gets as pullChartResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType[]
     */
    public function getPullChartResult()
    {
        return $this->pullChartResult;
    }

    /**
     * Sets a new pullChartResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ChartEntryType[] $pullChartResult
     * @return self
     */
    public function setPullChartResult(array $pullChartResult)
    {
        $this->pullChartResult = $pullChartResult;
        return $this;
    }


}

