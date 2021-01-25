<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DocumentPushRequestType.
 *
 * XSD Type: DocumentPushRequest
 */
class DocumentPushRequestType
{
    /**
     * @var string
     */
    private $dealKey = null;

    /**
     * @var string
     */
    private $document = null;

    /**
     * @var string
     */
    private $documentKey = null;

    /**
     * @var string
     */
    private $documentName = null;

    /**
     * @var string
     */
    private $externalDocumentKey = null;

    /**
     * @var int
     */
    private $storeId = null;

    /**
     * Gets as dealKey.
     *
     * @return string
     */
    public function getDealKey()
    {
        return $this->dealKey;
    }

    /**
     * Sets a new dealKey.
     *
     * @param string $dealKey
     *
     * @return self
     */
    public function setDealKey($dealKey)
    {
        $this->dealKey = $dealKey;

        return $this;
    }

    /**
     * Gets as document.
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Sets a new document.
     *
     * @param string $document
     *
     * @return self
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Gets as documentKey.
     *
     * @return string
     */
    public function getDocumentKey()
    {
        return $this->documentKey;
    }

    /**
     * Sets a new documentKey.
     *
     * @param string $documentKey
     *
     * @return self
     */
    public function setDocumentKey($documentKey)
    {
        $this->documentKey = $documentKey;

        return $this;
    }

    /**
     * Gets as documentName.
     *
     * @return string
     */
    public function getDocumentName()
    {
        return $this->documentName;
    }

    /**
     * Sets a new documentName.
     *
     * @param string $documentName
     *
     * @return self
     */
    public function setDocumentName($documentName)
    {
        $this->documentName = $documentName;

        return $this;
    }

    /**
     * Gets as externalDocumentKey.
     *
     * @return string
     */
    public function getExternalDocumentKey()
    {
        return $this->externalDocumentKey;
    }

    /**
     * Sets a new externalDocumentKey.
     *
     * @param string $externalDocumentKey
     *
     * @return self
     */
    public function setExternalDocumentKey($externalDocumentKey)
    {
        $this->externalDocumentKey = $externalDocumentKey;

        return $this;
    }

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }
}
