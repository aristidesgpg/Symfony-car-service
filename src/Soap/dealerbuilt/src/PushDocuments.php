<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDocuments
 */
class PushDocuments
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType[] $documents
     */
    private $documents = null;

    /**
     * Adds as documentPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType $documentPushRequest
     */
    public function addToDocuments(\App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType $documentPushRequest)
    {
        $this->documents[] = $documentPushRequest;
        return $this;
    }

    /**
     * isset documents
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocuments($index)
    {
        return isset($this->documents[$index]);
    }

    /**
     * unset documents
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocuments($index)
    {
        unset($this->documents[$index]);
    }

    /**
     * Gets as documents
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType[]
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Sets a new documents
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DocumentPushRequestType[] $documents
     * @return self
     */
    public function setDocuments(array $documents)
    {
        $this->documents = $documents;
        return $this;
    }


}

