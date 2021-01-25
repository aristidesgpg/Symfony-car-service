<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfGlDetailItemType.
 *
 * XSD Type: ArrayOfGlDetailItem
 */
class ArrayOfGlDetailItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType[]
     */
    private $glDetailItem = [
    ];

    /**
     * Adds as glDetailItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType $glDetailItem
     */
    public function addToGlDetailItem(GlDetailItemType $glDetailItem)
    {
        $this->glDetailItem[] = $glDetailItem;

        return $this;
    }

    /**
     * isset glDetailItem.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGlDetailItem($index)
    {
        return isset($this->glDetailItem[$index]);
    }

    /**
     * unset glDetailItem.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGlDetailItem($index)
    {
        unset($this->glDetailItem[$index]);
    }

    /**
     * Gets as glDetailItem.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType[]
     */
    public function getGlDetailItem()
    {
        return $this->glDetailItem;
    }

    /**
     * Sets a new glDetailItem.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlDetailItemType[] $glDetailItem
     *
     * @return self
     */
    public function setGlDetailItem(array $glDetailItem)
    {
        $this->glDetailItem = $glDetailItem;

        return $this;
    }
}
