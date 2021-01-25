<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing ArrayOfCodeTypeDetailType
 *
 * 
 * XSD Type: ArrayOfCodeTypeDetail
 */
class ArrayOfCodeTypeDetailType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType[] $codeTypeDetail
     */
    private $codeTypeDetail = [
        
    ];

    /**
     * Adds as codeTypeDetail
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType $codeTypeDetail
     */
    public function addToCodeTypeDetail(\App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType $codeTypeDetail)
    {
        $this->codeTypeDetail[] = $codeTypeDetail;
        return $this;
    }

    /**
     * isset codeTypeDetail
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCodeTypeDetail($index)
    {
        return isset($this->codeTypeDetail[$index]);
    }

    /**
     * unset codeTypeDetail
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCodeTypeDetail($index)
    {
        unset($this->codeTypeDetail[$index]);
    }

    /**
     * Gets as codeTypeDetail
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType[]
     */
    public function getCodeTypeDetail()
    {
        return $this->codeTypeDetail;
    }

    /**
     * Sets a new codeTypeDetail
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType[] $codeTypeDetail
     * @return self
     */
    public function setCodeTypeDetail(array $codeTypeDetail)
    {
        $this->codeTypeDetail = $codeTypeDetail;
        return $this;
    }


}

