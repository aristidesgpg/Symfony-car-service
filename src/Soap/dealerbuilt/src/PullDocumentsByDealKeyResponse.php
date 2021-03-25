<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDocumentsByDealKeyResponse
 */
class PullDocumentsByDealKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DocumentType[] $pullDocumentsByDealKeyResult
     */
    private $pullDocumentsByDealKeyResult = null;

    /**
     * Adds as document
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentType $document
     */
    public function addToPullDocumentsByDealKeyResult(\App\Soap\dealerbuilt\src\BaseApi\DocumentType $document)
    {
        $this->pullDocumentsByDealKeyResult[] = $document;
        return $this;
    }

    /**
     * isset pullDocumentsByDealKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullDocumentsByDealKeyResult($index)
    {
        return isset($this->pullDocumentsByDealKeyResult[$index]);
    }

    /**
     * unset pullDocumentsByDealKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullDocumentsByDealKeyResult($index)
    {
        unset($this->pullDocumentsByDealKeyResult[$index]);
    }

    /**
     * Gets as pullDocumentsByDealKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DocumentType[]
     */
    public function getPullDocumentsByDealKeyResult()
    {
        return $this->pullDocumentsByDealKeyResult;
    }

    /**
     * Sets a new pullDocumentsByDealKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentType[] $pullDocumentsByDealKeyResult
     * @return self
     */
    public function setPullDocumentsByDealKeyResult(array $pullDocumentsByDealKeyResult)
    {
        $this->pullDocumentsByDealKeyResult = $pullDocumentsByDealKeyResult;
        return $this;
    }


}

