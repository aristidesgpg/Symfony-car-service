<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDeferredJobsByVehicleKeyResponse.
 */
class PullDeferredJobsByVehicleKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[]
     */
    private $pullDeferredJobsByVehicleKeyResult = null;

    /**
     * Adds as deferredJob.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType $deferredJob
     */
    public function addToPullDeferredJobsByVehicleKeyResult(BaseApi\DeferredJobType $deferredJob)
    {
        $this->pullDeferredJobsByVehicleKeyResult[] = $deferredJob;

        return $this;
    }

    /**
     * isset pullDeferredJobsByVehicleKeyResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullDeferredJobsByVehicleKeyResult($index)
    {
        return isset($this->pullDeferredJobsByVehicleKeyResult[$index]);
    }

    /**
     * unset pullDeferredJobsByVehicleKeyResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullDeferredJobsByVehicleKeyResult($index)
    {
        unset($this->pullDeferredJobsByVehicleKeyResult[$index]);
    }

    /**
     * Gets as pullDeferredJobsByVehicleKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[]
     */
    public function getPullDeferredJobsByVehicleKeyResult()
    {
        return $this->pullDeferredJobsByVehicleKeyResult;
    }

    /**
     * Sets a new pullDeferredJobsByVehicleKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[] $pullDeferredJobsByVehicleKeyResult
     *
     * @return self
     */
    public function setPullDeferredJobsByVehicleKeyResult(array $pullDeferredJobsByVehicleKeyResult)
    {
        $this->pullDeferredJobsByVehicleKeyResult = $pullDeferredJobsByVehicleKeyResult;

        return $this;
    }
}
