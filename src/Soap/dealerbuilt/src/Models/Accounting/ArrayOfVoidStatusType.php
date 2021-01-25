<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing ArrayOfVoidStatusType
 *
 * 
 * XSD Type: ArrayOfVoidStatusType
 */
class ArrayOfVoidStatusType
{

    /**
     * @var string[] $voidStatusType
     */
    private $voidStatusType = [
        
    ];

    /**
     * Adds as voidStatusType
     *
     * @return self
     * @param string $voidStatusType
     */
    public function addToVoidStatusType($voidStatusType)
    {
        $this->voidStatusType[] = $voidStatusType;
        return $this;
    }

    /**
     * isset voidStatusType
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVoidStatusType($index)
    {
        return isset($this->voidStatusType[$index]);
    }

    /**
     * unset voidStatusType
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVoidStatusType($index)
    {
        unset($this->voidStatusType[$index]);
    }

    /**
     * Gets as voidStatusType
     *
     * @return string[]
     */
    public function getVoidStatusType()
    {
        return $this->voidStatusType;
    }

    /**
     * Sets a new voidStatusType
     *
     * @param string $voidStatusType
     * @return self
     */
    public function setVoidStatusType(array $voidStatusType)
    {
        $this->voidStatusType = $voidStatusType;
        return $this;
    }


}

