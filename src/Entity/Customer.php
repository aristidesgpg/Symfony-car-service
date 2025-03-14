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
class Customer implements UserInterface
{
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
     * @ORM\Column(type="string", nullable=true, length=10)
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

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderReviewInteractions::class, mappedBy="customer")
     */
    private $repairOrderReviewInteractions;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderCustomer::class, mappedBy="customer", orphanRemoval=true)
     */
    private $repairOrderCustomers;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteInteraction::class, mappedBy="customer")
     */
    private $repairOrderQuoteInteractions;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->primaryRepairOrders = new ArrayCollection();
        $this->repairOrderMPIInteractions = new ArrayCollection();
        $this->repairOrderInteractions = new ArrayCollection();
        $this->serviceSMS = new ArrayCollection();
        $this->repairOrderReviewInteractions = new ArrayCollection();
        $this->repairOrderCustomers = new ArrayCollection();
        $this->repairOrderQuoteInteractions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @return $this
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMobileConfirmed(): ?bool
    {
        return $this->mobileConfirmed;
    }

    /**
     * @return $this
     */
    public function setMobileConfirmed(bool $mobileConfirmed): self
    {
        $this->mobileConfirmed = $mobileConfirmed;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function isDoNotContact(): bool
    {
        return $this->doNotContact;
    }

    /**
     * @return Customer
     */
    public function setDoNotContact(bool $doNotContact): self
    {
        $this->doNotContact = $doNotContact;

        return $this;
    }

    public function getAddedBy(): ?User
    {
        return $this->addedBy;
    }

    /**
     * @param User
     *
     * @return $this
     */
    public function setAddedBy(User $addedBy): self
    {
        $this->addedBy = $addedBy;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @return RepairOrder[]
     */
    public function getPrimaryRepairOrders(): array
    {
        return $this->primaryRepairOrders->toArray();
    }

    public function getRoles()
    {
        return ['ROLE_CUSTOMER'];
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->getName();
    }

    /**
     * @return void
     */
    public function eraseCredentials()
    {
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

    public function getRepairOrderCustomers(): Collection
    {
        return $this->repairOrderCustomers;
    }

    public function addRepairOrderCustomer(RepairOrderCustomer $repairOrderCustomer): self
    {
        if (!$this->repairOrderCustomers->contains($repairOrderCustomer)) {
            $repairOrderCustomer->setCustomer($this);
        }

        return $this;
    }

    /**
     * @return Collection|RepairOrderQuoteInteraction[]
     */
    public function getRepairOrderQuoteInteractions(): Collection
    {
        return $this->repairOrderQuoteInteractions;
    }

    public function addRepairOrderQuoteInteractions(RepairOrderQuoteInteraction $repairOrderQuoteInteractions): self
    {
        if (!$this->repairOrderQuoteInteractions->contains($repairOrderQuoteInteractions)) {
            $repairOrderQuoteInteractions->setCustomer($this);
        }

        return $this;
    }

    public function removeRepairOrderCustomer(RepairOrderCustomer $repairOrderCustomer): self
    {
        if ($this->repairOrderCustomers->contains($repairOrderCustomer)) {
            $this->repairOrderCustomers->removeElement($repairOrderCustomer);
            // set the owning side to null (unless already changed)
            if ($repairOrderCustomer->getCustomer() === $this) {
                $repairOrderCustomer->setCustomer(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderQuoteInteractions(RepairOrderQuoteInteraction $repairOrderQuoteInteractions): self
    {
        if ($this->repairOrderQuoteInteractions->contains($repairOrderQuoteInteractions)) {
            $this->repairOrderQuoteInteractions->removeElement($repairOrderQuoteInteractions);
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteInteractions->getCustomer() === $this) {
                $repairOrderQuoteInteractions->setCustomer(null);
            }
        }

        return $this;
    }
}
