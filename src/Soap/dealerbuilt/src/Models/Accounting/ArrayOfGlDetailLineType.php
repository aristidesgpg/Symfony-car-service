<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing ArrayOfGlDetailLineType
 *
 * 
 * XSD Type: ArrayOfGlDetailLine
 */
class ArrayOfGlDetailLineType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType[] $glDetailLine
     */
    private $glDetailLine = [
        
    ];

    /**
     * Adds as glDetailLine
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType $glDetailLine
     */
    public function addToGlDetailLine(\App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType $glDetailLine)
    {
        $this->glDetailLine[] = $glDetailLine;
        return $this;
    }

    /**
     * isset glDetailLine
     *
     * @param int|string $index
     * @return bool
     */
    public function issetGlDetailLine($index)
    {
        return isset($this->glDetailLine[$index]);
    }

    /**
     * unset glDetailLine
     *
     * @param int|string $index
     * @return void
     */
    public function unsetGlDetailLine($index)
    {
        unset($this->glDetailLine[$index]);
    }

    /**
     * Gets as glDetailLine
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType[]
     */
    public function getGlDetailLine()
    {
        return $this->glDetailLine;
    }

    /**
     * Sets a new glDetailLine
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType[] $glDetailLine
     * @return self
     */
    public function setGlDetailLine(array $glDetailLine)
    {
        $this->glDetailLine = $glDetailLine;
        return $this;
    }


}

