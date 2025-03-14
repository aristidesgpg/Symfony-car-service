<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing ArrayOfdecimalType
 *
 * 
 * XSD Type: ArrayOfdecimal
 */
class ArrayOfdecimalType
{

    /**
     * @var float[] $decimal
     */
    private $decimal = [
        
    ];

    /**
     * Adds as decimal
     *
     * @return self
     * @param float $decimal
     */
    public function addToDecimal($decimal)
    {
        $this->decimal[] = $decimal;
        return $this;
    }

    /**
     * isset decimal
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDecimal($index)
    {
        return isset($this->decimal[$index]);
    }

    /**
     * unset decimal
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDecimal($index)
    {
        unset($this->decimal[$index]);
    }

    /**
     * Gets as decimal
     *
     * @return float[]
     */
    public function getDecimal()
    {
        return $this->decimal;
    }

    /**
     * Sets a new decimal
     *
     * @param float[] $decimal
     * @return self
     */
    public function setDecimal(array $decimal)
    {
        $this->decimal = $decimal;
        return $this;
    }


}

