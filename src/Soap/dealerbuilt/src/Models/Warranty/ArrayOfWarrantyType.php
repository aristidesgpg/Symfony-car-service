<?php

namespace App\Soap\dealerbuilt\src\Models\Warranty;

/**
 * Class representing ArrayOfWarrantyType
 *
 * 
 * XSD Type: ArrayOfWarranty
 */
class ArrayOfWarrantyType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType[] $warranty
     */
    private $warranty = [
        
    ];

    /**
     * Adds as warranty
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType $warranty
     */
    public function addToWarranty(\App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType $warranty)
    {
        $this->warranty[] = $warranty;
        return $this;
    }

    /**
     * isset warranty
     *
     * @param int|string $index
     * @return bool
     */
    public function issetWarranty($index)
    {
        return isset($this->warranty[$index]);
    }

    /**
     * unset warranty
     *
     * @param int|string $index
     * @return void
     */
    public function unsetWarranty($index)
    {
        unset($this->warranty[$index]);
    }

    /**
     * Gets as warranty
     *
     * @return \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType[]
     */
    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * Sets a new warranty
     *
     * @param \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType[] $warranty
     * @return self
     */
    public function setWarranty(array $warranty)
    {
        $this->warranty = $warranty;
        return $this;
    }


}

