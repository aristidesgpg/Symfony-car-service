<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing ArrayOflongType
 *
 * 
 * XSD Type: ArrayOflong
 */
class ArrayOflongType
{

    /**
     * @var int[] $long
     */
    private $long = [
        
    ];

    /**
     * Adds as long
     *
     * @return self
     * @param int $long
     */
    public function addToLong($long)
    {
        $this->long[] = $long;
        return $this;
    }

    /**
     * isset long
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLong($index)
    {
        return isset($this->long[$index]);
    }

    /**
     * unset long
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLong($index)
    {
        unset($this->long[$index]);
    }

    /**
     * Gets as long
     *
     * @return int[]
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Sets a new long
     *
     * @param int[] $long
     * @return self
     */
    public function setLong(array $long)
    {
        $this->long = $long;
        return $this;
    }


}

