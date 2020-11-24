<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PaymentResponse {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responseText;

    /**
     * @ORM\Column(type="text")
     */
    private $rawResponse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    private $parsedResponse = [];

    public function __construct (string $type, string $curlResponse) {
        $this->type = $type;
        $this->rawResponse = $curlResponse;
        $this->created = new \DateTime();

        $parsed = $this->getParsedResponse();
        $this->code = (int)$parsed['response_code'] ?? -1;
        $this->responseText = $parsed['responsetext'] ?? 'Unknown. responsetext missing.';
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    public function getRawResponse (): string {
        return $this->rawResponse;
    }

    public function getParsedResponse (): array {
        if (empty($this->parsedResponse)) {
            parse_str($this->rawResponse, $this->parsedResponse);
        }

        return $this->parsedResponse;
    }

    /**
     * @return string
     */
    public function getType (): string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCode (): int {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getResponseText (): string {
        return $this->responseText;
    }

    /**
     * @return \DateTime
     */
    public function getCreated (): \DateTime {
        return $this->created;
    }

    /**
     * @return bool
     */
    public function isOk (): bool {
        return $this->code === 100;
    }
}