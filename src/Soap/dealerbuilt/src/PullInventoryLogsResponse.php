<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryLogsResponse
 */
class PullInventoryLogsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LoggingType[] $pullInventoryLogsResult
     */
    private $pullInventoryLogsResult = null;

    /**
     * Adds as logging
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\LoggingType $logging
     */
    public function addToPullInventoryLogsResult(\App\Soap\dealerbuilt\src\BaseApi\LoggingType $logging)
    {
        $this->pullInventoryLogsResult[] = $logging;
        return $this;
    }

    /**
     * isset pullInventoryLogsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullInventoryLogsResult($index)
    {
        return isset($this->pullInventoryLogsResult[$index]);
    }

    /**
     * unset pullInventoryLogsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullInventoryLogsResult($index)
    {
        unset($this->pullInventoryLogsResult[$index]);
    }

    /**
     * Gets as pullInventoryLogsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LoggingType[]
     */
    public function getPullInventoryLogsResult()
    {
        return $this->pullInventoryLogsResult;
    }

    /**
     * Sets a new pullInventoryLogsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LoggingType[] $pullInventoryLogsResult
     * @return self
     */
    public function setPullInventoryLogsResult(array $pullInventoryLogsResult)
    {
        $this->pullInventoryLogsResult = $pullInventoryLogsResult;
        return $this;
    }


}

