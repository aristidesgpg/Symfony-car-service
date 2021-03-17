<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing ArrayOfNumberedPersonInfoType
 *
 * 
 * XSD Type: ArrayOfNumberedPersonInfo
 */
class ArrayOfNumberedPersonInfoType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[] $numberedPersonInfo
     */
    private $numberedPersonInfo = [
        
    ];

    /**
     * Adds as numberedPersonInfo
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $numberedPersonInfo
     */
    public function addToNumberedPersonInfo(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $numberedPersonInfo)
    {
        $this->numberedPersonInfo[] = $numberedPersonInfo;
        return $this;
    }

    /**
     * isset numberedPersonInfo
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNumberedPersonInfo($index)
    {
        return isset($this->numberedPersonInfo[$index]);
    }

    /**
     * unset numberedPersonInfo
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNumberedPersonInfo($index)
    {
        unset($this->numberedPersonInfo[$index]);
    }

    /**
     * Gets as numberedPersonInfo
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    public function getNumberedPersonInfo()
    {
        return $this->numberedPersonInfo;
    }

    /**
     * Sets a new numberedPersonInfo
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[] $numberedPersonInfo
     * @return self
     */
    public function setNumberedPersonInfo(array $numberedPersonInfo)
    {
        $this->numberedPersonInfo = $numberedPersonInfo;
        return $this;
    }


}

