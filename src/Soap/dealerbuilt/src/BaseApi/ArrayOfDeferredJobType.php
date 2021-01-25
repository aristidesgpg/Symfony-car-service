<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDeferredJobType
 *
 * 
 * XSD Type: ArrayOfDeferredJob
 */
class ArrayOfDeferredJobType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[] $deferredJob
     */
    private $deferredJob = [
        
    ];

    /**
     * Adds as deferredJob
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType $deferredJob
     */
    public function addToDeferredJob(\App\Soap\dealerbuilt\src\BaseApi\DeferredJobType $deferredJob)
    {
        $this->deferredJob[] = $deferredJob;
        return $this;
    }

    /**
     * isset deferredJob
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDeferredJob($index)
    {
        return isset($this->deferredJob[$index]);
    }

    /**
     * unset deferredJob
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDeferredJob($index)
    {
        unset($this->deferredJob[$index]);
    }

    /**
     * Gets as deferredJob
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[]
     */
    public function getDeferredJob()
    {
        return $this->deferredJob;
    }

    /**
     * Sets a new deferredJob
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobType[] $deferredJob
     * @return self
     */
    public function setDeferredJob(array $deferredJob)
    {
        $this->deferredJob = $deferredJob;
        return $this;
    }


}

