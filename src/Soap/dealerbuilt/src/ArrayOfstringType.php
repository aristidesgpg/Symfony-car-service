<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing ArrayOfstringType
 *
 * 
 * XSD Type: ArrayOfstring
 */
class ArrayOfstringType
{

    /**
     * @var string[] $string
     */
    private $string = [
        
    ];

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToString($string)
    {
        $this->string[] = $string;
        return $this;
    }

    /**
     * isset string
     *
     * @param int|string $index
     * @return bool
     */
    public function issetString($index)
    {
        return isset($this->string[$index]);
    }

    /**
     * unset string
     *
     * @param int|string $index
     * @return void
     */
    public function unsetString($index)
    {
        unset($this->string[$index]);
    }

    /**
     * Gets as string
     *
     * @return string[]
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * Sets a new string
     *
     * @param string[] $string
     * @return self
     */
    public function setString(array $string)
    {
        $this->string = $string;
        return $this;
    }


}

