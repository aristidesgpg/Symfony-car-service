<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullOemServiceProfilesResponse
 */
class PullOemServiceProfilesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType[] $pullOemServiceProfilesResult
     */
    private $pullOemServiceProfilesResult = null;

    /**
     * Adds as oemServiceProfile
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType $oemServiceProfile
     */
    public function addToPullOemServiceProfilesResult(\App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType $oemServiceProfile)
    {
        $this->pullOemServiceProfilesResult[] = $oemServiceProfile;
        return $this;
    }

    /**
     * isset pullOemServiceProfilesResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullOemServiceProfilesResult($index)
    {
        return isset($this->pullOemServiceProfilesResult[$index]);
    }

    /**
     * unset pullOemServiceProfilesResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullOemServiceProfilesResult($index)
    {
        unset($this->pullOemServiceProfilesResult[$index]);
    }

    /**
     * Gets as pullOemServiceProfilesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType[]
     */
    public function getPullOemServiceProfilesResult()
    {
        return $this->pullOemServiceProfilesResult;
    }

    /**
     * Sets a new pullOemServiceProfilesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType[] $pullOemServiceProfilesResult
     * @return self
     */
    public function setPullOemServiceProfilesResult(array $pullOemServiceProfilesResult)
    {
        $this->pullOemServiceProfilesResult = $pullOemServiceProfilesResult;
        return $this;
    }


}

