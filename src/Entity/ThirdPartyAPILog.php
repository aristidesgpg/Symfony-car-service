<?php

namespace App\Entity;

use App\Repository\ThirdPartyAPILogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThirdPartyAPILogRepository::class)
 */
class ThirdPartyAPILog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private $endpoint;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $soapAction;

    /**
     * @ORM\Column(type="text")
     */
    private $response;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getSoapAction(): ?string
    {
        return $this->soapAction;
    }

    public function setSoapAction(?string $soapAction): self
    {
        $this->soapAction = $soapAction;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(string $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
