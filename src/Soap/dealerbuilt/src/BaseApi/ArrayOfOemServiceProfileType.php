<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfOemServiceProfileType
 *
 * 
 * XSD Type: ArrayOfOemServiceProfile
 */
class ArrayOfOemServiceProfileType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType[] $oemServiceProfile
     */
    private $oemServiceProfile = [
        
    ];

    /**
     * Adds as oemServiceProfile
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType $oemServiceProfile
     */
    public function addToOemServiceProfile(\App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType $oemServiceProfile)
    {
        $this->oemServiceProfile[] = $oemServiceProfile;
        return $this;
    }

    /**
     * isset oemServiceProfile
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOemServiceProfile($index)
    {
        return isset($this->oemServiceProfile[$index]);
    }

    /**
     * unset oemServiceProfile
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOemServiceProfile($index)
    {
        unset($this->oemServiceProfile[$index]);
    }

    /**
     * Gets as oemServiceProfile
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType[]
     */
    public function getOemServiceProfile()
    {
        return $this->oemServiceProfile;
    }

    /**
     * Sets a new oemServiceProfile
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType[] $oemServiceProfile
     * @return self
     */
    public function setOemServiceProfile(array $oemServiceProfile)
    {
        $this->oemServiceProfile = $oemServiceProfile;
        return $this;
    }


}

