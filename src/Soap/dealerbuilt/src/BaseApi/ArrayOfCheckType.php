<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCheckType
 *
 * 
 * XSD Type: ArrayOfCheck
 */
class ArrayOfCheckType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CheckType[] $check
     */
    private $check = [
        
    ];

    /**
     * Adds as check
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CheckType $check
     */
    public function addToCheck(\App\Soap\dealerbuilt\src\BaseApi\CheckType $check)
    {
        $this->check[] = $check;
        return $this;
    }

    /**
     * isset check
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCheck($index)
    {
        return isset($this->check[$index]);
    }

    /**
     * unset check
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCheck($index)
    {
        unset($this->check[$index]);
    }

    /**
     * Gets as check
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CheckType[]
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * Sets a new check
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CheckType[] $check
     * @return self
     */
    public function setCheck(array $check)
    {
        $this->check = $check;
        return $this;
    }


}

