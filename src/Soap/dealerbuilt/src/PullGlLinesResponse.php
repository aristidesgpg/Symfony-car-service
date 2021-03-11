<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullGlLinesResponse
 */
class PullGlLinesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlLineType[] $pullGlLinesResult
     */
    private $pullGlLinesResult = null;

    /**
     * Adds as glLine
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlLineType $glLine
     */
    public function addToPullGlLinesResult(\App\Soap\dealerbuilt\src\BaseApi\GlLineType $glLine)
    {
        $this->pullGlLinesResult[] = $glLine;
        return $this;
    }

    /**
     * isset pullGlLinesResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullGlLinesResult($index)
    {
        return isset($this->pullGlLinesResult[$index]);
    }

    /**
     * unset pullGlLinesResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullGlLinesResult($index)
    {
        unset($this->pullGlLinesResult[$index]);
    }

    /**
     * Gets as pullGlLinesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlLineType[]
     */
    public function getPullGlLinesResult()
    {
        return $this->pullGlLinesResult;
    }

    /**
     * Sets a new pullGlLinesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlLineType[] $pullGlLinesResult
     * @return self
     */
    public function setPullGlLinesResult(array $pullGlLinesResult)
    {
        $this->pullGlLinesResult = $pullGlLinesResult;
        return $this;
    }


}

