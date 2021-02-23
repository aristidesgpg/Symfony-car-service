<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetStoreSetupsResponse
 */
class GetStoreSetupsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType[] $getStoreSetupsResult
     */
    private $getStoreSetupsResult = null;

    /**
     * Adds as storeSetup
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType $storeSetup
     */
    public function addToGetStoreSetupsResult(\App\Soap\dealerbuilt\src\BaseApi\StoreSetupType $storeSetup)
    {
        $this->getStoreSetupsResult[] = $storeSetup;
        return $this;
    }

    /**
     * isset getStoreSetupsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetGetStoreSetupsResult($index)
    {
        return isset($this->getStoreSetupsResult[$index]);
    }

    /**
     * unset getStoreSetupsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetGetStoreSetupsResult($index)
    {
        unset($this->getStoreSetupsResult[$index]);
    }

    /**
     * Gets as getStoreSetupsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType[]
     */
    public function getGetStoreSetupsResult()
    {
        return $this->getStoreSetupsResult;
    }

    /**
     * Sets a new getStoreSetupsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType[] $getStoreSetupsResult
     * @return self
     */
    public function setGetStoreSetupsResult(array $getStoreSetupsResult)
    {
        $this->getStoreSetupsResult = $getStoreSetupsResult;
        return $this;
    }


}

