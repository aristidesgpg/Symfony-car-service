<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfApiServiceDocumentType
 *
 * 
 * XSD Type: ArrayOfApiServiceDocument
 */
class ArrayOfApiServiceDocumentType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType[] $apiServiceDocument
     */
    private $apiServiceDocument = [
        
    ];

    /**
     * Adds as apiServiceDocument
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType $apiServiceDocument
     */
    public function addToApiServiceDocument(\App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType $apiServiceDocument)
    {
        $this->apiServiceDocument[] = $apiServiceDocument;
        return $this;
    }

    /**
     * isset apiServiceDocument
     *
     * @param int|string $index
     * @return bool
     */
    public function issetApiServiceDocument($index)
    {
        return isset($this->apiServiceDocument[$index]);
    }

    /**
     * unset apiServiceDocument
     *
     * @param int|string $index
     * @return void
     */
    public function unsetApiServiceDocument($index)
    {
        unset($this->apiServiceDocument[$index]);
    }

    /**
     * Gets as apiServiceDocument
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType[]
     */
    public function getApiServiceDocument()
    {
        return $this->apiServiceDocument;
    }

    /**
     * Sets a new apiServiceDocument
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiServiceDocumentType[] $apiServiceDocument
     * @return self
     */
    public function setApiServiceDocument(array $apiServiceDocument)
    {
        $this->apiServiceDocument = $apiServiceDocument;
        return $this;
    }


}

