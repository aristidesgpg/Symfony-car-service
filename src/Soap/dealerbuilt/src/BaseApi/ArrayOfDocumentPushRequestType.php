<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDocumentPushRequestType.
 *
 * XSD Type: ArrayOfDocumentPushRequest
 */
class ArrayOfDocumentPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType[]
     */
    private $documentPushRequest = [
    ];

    /**
     * Adds as documentPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType $documentPushRequest
     */
    public function addToDocumentPushRequest(DocumentPushRequestType $documentPushRequest)
    {
        $this->documentPushRequest[] = $documentPushRequest;

        return $this;
    }

    /**
     * isset documentPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDocumentPushRequest($index)
    {
        return isset($this->documentPushRequest[$index]);
    }

    /**
     * unset documentPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDocumentPushRequest($index)
    {
        unset($this->documentPushRequest[$index]);
    }

    /**
     * Gets as documentPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType[]
     */
    public function getDocumentPushRequest()
    {
        return $this->documentPushRequest;
    }

    /**
     * Sets a new documentPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType[] $documentPushRequest
     *
     * @return self
     */
    public function setDocumentPushRequest(array $documentPushRequest)
    {
        $this->documentPushRequest = $documentPushRequest;

        return $this;
    }
}
