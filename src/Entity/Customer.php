<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $mobileConfirmed = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $doNotContact = false;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $addedBy;

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFirstName (): ?string {
        return $this->firstName;
    }

    /**'
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName (string $firstName): self {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName (): ?string {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName (string $lastName): self {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhone (): ?int {
        return $this->phone;
    }

    /**
     * @param int $phone
     *
     * @return $this
     */
    public function setPhone (int $phone): self {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMobileConfirmed (): ?bool {
        return $this->mobileConfirmed;
    }

    /**
     * @param bool $mobileConfirmed
     *
     * @return $this
     */
    public function setMobileConfirmed (bool $mobileConfirmed): self {
        $this->mobileConfirmed = $mobileConfirmed;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail (): ?string {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return $this
     */
    public function setEmail (?string $email): self {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDoNotContact (): bool {
        return $this->doNotContact;
    }

    /**
     * @param bool $doNotContact
     *
     * @return Customer
     */
    public function setDoNotContact (bool $doNotContact): self {
        $this->doNotContact = $doNotContact;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAddedBy (): ?int {
        return $this->addedBy;
    }

    /**
     * @param int|null $addedBy
     *
     * @return $this
     */
    public function setAddedBy (?int $addedBy): self {
        $this->addedBy = $addedBy;

        return $this;
    }

}
