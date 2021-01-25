<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfGlSummaryItemType.
 *
 * XSD Type: ArrayOfGlSummaryItem
 */
class ArrayOfGlSummaryItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType[]
     */
    private $glSummaryItem = [
    ];

    /**
     * Adds as glSummaryItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType $glSummaryItem
     */
    public function addToGlSummaryItem(GlSummaryItemType $glSummaryItem)
    {
        $this->glSummaryItem[] = $glSummaryItem;

        return $this;
    }

    /**
     * isset glSummaryItem.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGlSummaryItem($index)
    {
        return isset($this->glSummaryItem[$index]);
    }

    /**
     * unset glSummaryItem.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGlSummaryItem($index)
    {
        unset($this->glSummaryItem[$index]);
    }

    /**
     * Gets as glSummaryItem.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType[]
     */
    public function getGlSummaryItem()
    {
        return $this->glSummaryItem;
    }

    /**
     * Sets a new glSummaryItem.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlSummaryItemType[] $glSummaryItem
     *
     * @return self
     */
    public function setGlSummaryItem(array $glSummaryItem)
    {
        $this->glSummaryItem = $glSummaryItem;

        return $this;
    }
}
