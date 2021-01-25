<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderDocumentsResponse
 */
class PullRepairOrderDocumentsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType[] $pullRepairOrderDocumentsResult
     */
    private $pullRepairOrderDocumentsResult = null;

    /**
     * Adds as apiServiceDocument
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType $apiServiceDocument
     */
    public function addToPullRepairOrderDocumentsResult(\App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType $apiServiceDocument)
    {
        $this->pullRepairOrderDocumentsResult[] = $apiServiceDocument;
        return $this;
    }

    /**
     * isset pullRepairOrderDocumentsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullRepairOrderDocumentsResult($index)
    {
        return isset($this->pullRepairOrderDocumentsResult[$index]);
    }

    /**
     * unset pullRepairOrderDocumentsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullRepairOrderDocumentsResult($index)
    {
        unset($this->pullRepairOrderDocumentsResult[$index]);
    }

    /**
     * Gets as pullRepairOrderDocumentsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType[]
     */
    public function getPullRepairOrderDocumentsResult()
    {
        return $this->pullRepairOrderDocumentsResult;
    }

    /**
     * Sets a new pullRepairOrderDocumentsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType[] $pullRepairOrderDocumentsResult
     * @return self
     */
    public function setPullRepairOrderDocumentsResult(array $pullRepairOrderDocumentsResult)
    {
        $this->pullRepairOrderDocumentsResult = $pullRepairOrderDocumentsResult;
        return $this;
    }


}

