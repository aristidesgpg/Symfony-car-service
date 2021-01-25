<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing ArrayOfMnCodeTypeDetailType.
 *
 * XSD Type: ArrayOfMnCodeTypeDetail
 */
class ArrayOfMnCodeTypeDetailType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType[]
     */
    private $mnCodeTypeDetail = [
    ];

    /**
     * Adds as mnCodeTypeDetail.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType $mnCodeTypeDetail
     */
    public function addToMnCodeTypeDetail(MnCodeTypeDetailType $mnCodeTypeDetail)
    {
        $this->mnCodeTypeDetail[] = $mnCodeTypeDetail;

        return $this;
    }

    /**
     * isset mnCodeTypeDetail.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetMnCodeTypeDetail($index)
    {
        return isset($this->mnCodeTypeDetail[$index]);
    }

    /**
     * unset mnCodeTypeDetail.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetMnCodeTypeDetail($index)
    {
        unset($this->mnCodeTypeDetail[$index]);
    }

    /**
     * Gets as mnCodeTypeDetail.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType[]
     */
    public function getMnCodeTypeDetail()
    {
        return $this->mnCodeTypeDetail;
    }

    /**
     * Sets a new mnCodeTypeDetail.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType[] $mnCodeTypeDetail
     *
     * @return self
     */
    public function setMnCodeTypeDetail(array $mnCodeTypeDetail)
    {
        $this->mnCodeTypeDetail = $mnCodeTypeDetail;

        return $this;
    }
}
