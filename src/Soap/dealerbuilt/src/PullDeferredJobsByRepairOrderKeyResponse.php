<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDeferredJobsByRepairOrderKeyResponse.
 */
class PullDeferredJobsByRepairOrderKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[]
     */
    private $pullDeferredJobsByRepairOrderKeyResult = null;

    /**
     * Adds as deferredJob.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType $deferredJob
     */
    public function addToPullDeferredJobsByRepairOrderKeyResult(BaseApi\DeferredJobType $deferredJob)
    {
        $this->pullDeferredJobsByRepairOrderKeyResult[] = $deferredJob;

        return $this;
    }

    /**
     * isset pullDeferredJobsByRepairOrderKeyResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullDeferredJobsByRepairOrderKeyResult($index)
    {
        return isset($this->pullDeferredJobsByRepairOrderKeyResult[$index]);
    }

    /**
     * unset pullDeferredJobsByRepairOrderKeyResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullDeferredJobsByRepairOrderKeyResult($index)
    {
        unset($this->pullDeferredJobsByRepairOrderKeyResult[$index]);
    }

    /**
     * Gets as pullDeferredJobsByRepairOrderKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[]
     */
    public function getPullDeferredJobsByRepairOrderKeyResult()
    {
        return $this->pullDeferredJobsByRepairOrderKeyResult;
    }

    /**
     * Sets a new pullDeferredJobsByRepairOrderKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[] $pullDeferredJobsByRepairOrderKeyResult
     *
     * @return self
     */
    public function setPullDeferredJobsByRepairOrderKeyResult(array $pullDeferredJobsByRepairOrderKeyResult)
    {
        $this->pullDeferredJobsByRepairOrderKeyResult = $pullDeferredJobsByRepairOrderKeyResult;

        return $this;
    }
}
