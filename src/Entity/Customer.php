<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer implements UserInterface {
    public const GROUPS = ['customer_list'];

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
    private $name;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
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
     * @ORM\OneToMany(targetEntity=RepairOrderMPIInteraction::class, mappedBy="customer")
     */
    private $repairOrderMPIInteractions;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderInteraction::class, mappedBy="customer")
     */
    private $repairOrderInteractions;

    /**
     * @ORM\OneToMany(targetEntity=ServiceSMS::class, mappedBy="customer")
     */
    private $serviceSMS;
    
    /*
     * @ORM\OneToMany(targetEntity=RepairOrderReviewInteractions::class, mappedBy="customer")
     */
    private $repairOrderReviewInteractions;

    /**
     * Customer constructor.
     */
    public function __construct () {
        $this->primaryRepairOrders = new ArrayCollection();
        $this->repairOrderMPIInteractions = new ArrayCollection();
        $this->repairOrderInteractions = new ArrayCollection();

        $this->serviceSMS = new ArrayCollection();

        $this->repairOrderReviewInteractions = new ArrayCollection();
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
    public function getName (): ?string {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName (string $name): self {
        $this->name = $name;

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

    /**
     * @return RepairOrder[]
     */
    public function getPrimaryRepairOrders (): array {
        return $this->primaryRepairOrders->toArray();
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
        return $this->getName();
    }

    public function eraseCredentials () {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|RepairOrderMPIInteraction[]
     */
    public function getRepairOrderMPIInteractions(): Collection
    {
        return $this->repairOrderMPIInteractions;
    }

    public function addRepairOrderMPIInteraction(RepairOrderMPIInteraction $repairOrderMPIInteraction): self
    {
        if (!$this->repairOrderMPIInteractions->contains($repairOrderMPIInteraction)) {
            $this->repairOrderMPIInteractions[] = $repairOrderMPIInteraction;
            $repairOrderMPIInteraction->setCustomer($this);
        }

        return $this;
    }

    public function removeRepairOrderMPIInteraction(RepairOrderMPIInteraction $repairOrderMPIInteraction): self
    {
        if ($this->repairOrderMPIInteractions->contains($repairOrderMPIInteraction)) {
            $this->repairOrderMPIInteractions->removeElement($repairOrderMPIInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderMPIInteraction->getCustomer() === $this) {
                $repairOrderMPIInteraction->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RepairOrderInteraction[]
     */
    public function getRepairOrderInteractions(): Collection
    {
        return $this->repairOrderInteractions;
    }

    public function addRepairOrderInteraction(RepairOrderInteraction $repairOrderInteraction): self
    {
        if (!$this->repairOrderInteractions->contains($repairOrderInteraction)) {
            $this->repairOrderInteractions[] = $repairOrderInteraction;
            $repairOrderInteraction->setCustomer($this);
        }

        return $this;
    }

    public function removeRepairOrderInteraction(RepairOrderInteraction $repairOrderInteraction): self
    {
        if ($this->repairOrderInteractions->contains($repairOrderInteraction)) {
            $this->repairOrderInteractions->removeElement($repairOrderInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderInteraction->getCustomer() === $this) {
                $repairOrderInteraction->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ServiceSMS[]
     */
    public function getServiceSMS(): Collection
    {
        return $this->serviceSMS;
    }

    public function addServiceSM(ServiceSMS $serviceSM): self
    {
        if (!$this->serviceSMS->contains($serviceSM)) {
            $this->serviceSMS[] = $serviceSM;
            $serviceSM->setCustomer($this);
        }

        return $this;
    }
    /*
     * @return Collection|RepairOrderReviewInteractions[]
     */
    public function getRepairOrderReviewInteractions(): Collection
    {
        return $this->repairOrderReviewInteractions;
    }

    public function addRepairOrderReviewInteraction(RepairOrderReviewInteractions $repairOrderReviewInteraction): self
    {
        if (!$this->repairOrderReviewInteractions->contains($repairOrderReviewInteraction)) {
            $this->repairOrderReviewInteractions[] = $repairOrderReviewInteraction;
            $repairOrderReviewInteraction->setCustomer($this);
        }

        return $this;
    }

    public function removeServiceSM(ServiceSMS $serviceSM): self
    {
        if ($this->serviceSMS->removeElement($serviceSM)) {
            // set the owning side to null (unless already changed)
            if ($serviceSM->getCustomer() === $this) {
                $serviceSM->setCustomer(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderReviewInteraction(RepairOrderReviewInteractions $repairOrderReviewInteraction): self
    {
        if ($this->repairOrderReviewInteractions->contains($repairOrderReviewInteraction)) {
            $this->repairOrderReviewInteractions->removeElement($repairOrderReviewInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderReviewInteraction->getCustomer() === $this) {
                $repairOrderReviewInteraction->setCustomer(null);
            }
        }

        return $this;
    }
}
