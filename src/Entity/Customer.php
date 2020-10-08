<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer implements UserInterface {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"customer_list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"customer_list"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"customer_list"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=10)
     * @Serializer\Groups({"customer_list"})
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"customer_list"})
     */
    private $mobileConfirmed = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups({"customer_list"})
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"customer_list"})
     */
    private $doNotContact = false;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @Serializer\Groups({"customer_list"})
     */
    private $addedBy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted = false;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\RepairOrder", mappedBy="primaryCustomer")
     * @ORM\OrderBy({"dateCreated" = "DESC"})
     */
    private $primaryRepairOrders;

    /**
     * Customer constructor.
     */
    public function __construct () {
        $this->primaryRepairOrders = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFullName (): ?string {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getFirstName (): ?string {
        return $this->firstName;
    }

    /**
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
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone (string $phone): self {
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
     * @return User|null
     */
    public function getAddedBy (): ?User {
        return $this->addedBy;
    }

    /**
     * @param User
     *
     * @return $this
     */
    public function setAddedBy (User $addedBy): self {
        $this->addedBy = $addedBy;

        return $this;
    }

    /**
     * @param bool $deleted
     *
     * @return $this
     */
    public function setDeleted(bool $deleted): self {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool {
        return $this->deleted;
    }

    public function getPrimaryRepairOrders (): ArrayCollection {
        return $this->primaryRepairOrders;
    }

    public function getRoles () {
        return ['ROLE_CUSTOMER'];
    }

    public function getPassword () {
        // TODO: Implement getPassword() method.
    }

    public function getSalt () {
        // TODO: Implement getSalt() method.
    }

    public function getUsername () {
        return $this->getFullName();
    }

    public function eraseCredentials () {
        // TODO: Implement eraseCredentials() method.
    }
}
