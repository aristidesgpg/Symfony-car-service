<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiServiceDocumentType.
 *
 * XSD Type: ApiServiceDocument
 */
class ApiServiceDocumentType extends ApiServiceLocationItemType
{
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
    private $documentType = null;

    /**
     * @var string
     */
    private $format = null;

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
     * Gets as documentType.
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Sets a new documentType.
     *
     * @param string $documentType
     *
     * @return self
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Gets as format.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Sets a new format.
     *
     * @param string $format
     *
     * @return self
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }
}
