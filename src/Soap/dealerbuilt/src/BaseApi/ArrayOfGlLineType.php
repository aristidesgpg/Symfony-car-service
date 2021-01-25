<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfGlLineType.
 *
 * XSD Type: ArrayOfGlLine
 */
class ArrayOfGlLineType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlLineType[]
     */
    private $glLine = [
    ];

    /**
     * Adds as glLine.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlLineType $glLine
     */
    public function addToGlLine(GlLineType $glLine)
    {
        $this->glLine[] = $glLine;

        return $this;
    }

    /**
     * isset glLine.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGlLine($index)
    {
        return isset($this->glLine[$index]);
    }

    /**
     * unset glLine.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGlLine($index)
    {
        unset($this->glLine[$index]);
    }

    /**
     * Gets as glLine.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlLineType[]
     */
    public function getGlLine()
    {
        return $this->glLine;
    }

    /**
     * Sets a new glLine.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlLineType[] $glLine
     *
     * @return self
     */
    public function setGlLine(array $glLine)
    {
        $this->glLine = $glLine;

        return $this;
    }
}
