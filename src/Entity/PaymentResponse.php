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
     * @ORM\Column(type="text")
     */
    private $response;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    public function __construct (string $type, int $code, string $response) {
        $this->type = $type;
        $this->code = $code;
        $this->response = $response;
        $this->created = new \DateTime();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
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
    public function getResponse (): string {
        return $this->response;
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