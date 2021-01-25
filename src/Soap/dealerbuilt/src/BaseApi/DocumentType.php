<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DocumentType.
 *
 * XSD Type: Document
 */
class DocumentType extends ApiStoreItemType
{
    /**
     * @var string
     */
    private $dealKey = null;

    /**
     * @var string
     */
    private $documentKey = null;

    /**
     * @var string
     */
    private $documentName = null;

    /**
     * @var int
     */
    private $documentOrderSeq = null;

    /**
     * @var string
     */
    private $externalDocumentKey = null;

    /**
     * @var string
     */
    private $signedDocument = null;

    /**
     * @var string
     */
    private $unSignedDocument = null;

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
     * Gets as documentOrderSeq.
     *
     * @return int
     */
    public function getDocumentOrderSeq()
    {
        return $this->documentOrderSeq;
    }

    /**
     * Sets a new documentOrderSeq.
     *
     * @param int $documentOrderSeq
     *
     * @return self
     */
    public function setDocumentOrderSeq($documentOrderSeq)
    {
        $this->documentOrderSeq = $documentOrderSeq;

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
     * Gets as signedDocument.
     *
     * @return string
     */
    public function getSignedDocument()
    {
        return $this->signedDocument;
    }

    /**
     * Sets a new signedDocument.
     *
     * @param string $signedDocument
     *
     * @return self
     */
    public function setSignedDocument($signedDocument)
    {
        $this->signedDocument = $signedDocument;

        return $this;
    }

    /**
     * Gets as unSignedDocument.
     *
     * @return string
     */
    public function getUnSignedDocument()
    {
        return $this->unSignedDocument;
    }

    /**
     * Sets a new unSignedDocument.
     *
     * @param string $unSignedDocument
     *
     * @return self
     */
    public function setUnSignedDocument($unSignedDocument)
    {
        $this->unSignedDocument = $unSignedDocument;

        return $this;
    }
}
