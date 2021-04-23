<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *
 * @TODO: Look into doctrine event subscriber for automatically doing things when entities are created/updated
 *        'composer require antishov/doctrine-extensions-bundle'
 *        'https://symfonycasts.com/screencast/symfony4-doctrine/sluggable#play'
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"user_list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"user_list"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"user_list"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"user_list"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"user_list"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $extension;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"user_list"})
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups({"user_list"})
     */
    private $certification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups({"user_list"})
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups({"user_list"})
     */
    private $securityQuestion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $securityAnswer;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $previewDeviceTokens = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $forceAuthentication = false;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups({"user_list"})
     */
    private $lastLogin;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"user_list"})
     */
    private $active = true;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\RepairOrder", mappedBy="primaryTechnician")
     * @ORM\OrderBy({"dateCreated" = "DESC"})
     */
    private $technicianRepairOrders;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderMPIInteraction::class, mappedBy="user")
     */
    private $repairOrderMPIInteractions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pin;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"user_list"})
     */
    private $processRefund = false;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"user_list"})
     */
    private $shareRepairOrders = false;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderInteraction::class, mappedBy="user")
     */
    private $repairOrderInteractions;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderTeam::class, mappedBy="user")
     */
    private $repairOrderTeams;

    /**
     * @ORM\OneToMany(targetEntity=InternalMessage::class, mappedBy="from")
     */
    private $internalMessages;

    /**
     * @ORM\OneToMany(targetEntity=ServiceSMS::class, mappedBy="user")
     */
    private $serviceSMS;

    /**
     * @ORM\OneToMany(targetEntity=RepairOrderQuoteInteraction::class, mappedBy="user")
     */
    private $repairOrderQuoteInteractions;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Groups({"user_list"})
     */
    private $externalAuthentication = false;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->technicianRepairOrders = new ArrayCollection();
        $this->repairOrderMPIInteractions = new ArrayCollection();
        $this->repairOrderInteractions = new ArrayCollection();
        $this->repairOrderTeams = new ArrayCollection();
        $this->internalMessages = new ArrayCollection();
        $this->serviceSMS = new ArrayCollection();
        $this->repairOrderQuoteInteractions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return $this
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return $this
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
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

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    /**
     * @return $this
     */
    public function setExtension(?string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return array (Role|string)[]
     */
    public function getRoles()
    {
        return [$this->role];
    }

    /**
     * @return User
     */
    public function setRole(string $role)
    {
        $this->role = $role;

        return $this;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    /**
     * @return $this
     */
    public function setCertification(?string $certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    /**
     * @return $this
     */
    public function setExperience(?string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getSecurityQuestion(): ?string
    {
        return $this->securityQuestion;
    }

    /**
     * @return $this
     */
    public function setSecurityQuestion(?string $securityQuestion): self
    {
        $this->securityQuestion = $securityQuestion;

        return $this;
    }

    public function getSecurityAnswer(): ?string
    {
        return $this->securityAnswer;
    }

    /**
     * @return $this
     */
    public function setSecurityAnswer(?string $securityAnswer): self
    {
        $this->securityAnswer = $securityAnswer;

        return $this;
    }

    public function getPreviewDeviceTokens(): ?array
    {
        return $this->previewDeviceTokens;
    }

    /**
     * @return $this
     */
    public function setPreviewDeviceTokens(?array $previewDeviceTokens): self
    {
        $this->previewDeviceTokens = $previewDeviceTokens;

        return $this;
    }

    public function getForceAuthentication(): ?bool
    {
        return $this->forceAuthentication;
    }

    /**
     * @return $this
     */
    public function setForceAuthentication(bool $forceAuthentication): self
    {
        $this->forceAuthentication = $forceAuthentication;

        return $this;
    }

    public function getLastLogin(): DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @return User
     */
    public function setLastLogin(DateTime $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param $pin
     *
     * @return $this
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return $this
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getProcessRefund(): ?bool
    {
        return $this->processRefund;
    }

    public function setProcessRefund(bool $processRefund): self
    {
        $this->processRefund = $processRefund;

        return $this;
    }

    public function getShareRepairOrders(): ?bool
    {
        return $this->shareRepairOrders;
    }

    public function setShareRepairOrders(bool $shareRepairOrders): self
    {
        $this->shareRepairOrders = $shareRepairOrders;

        return $this;
    }

    /**
     * @return Collection|RepairOrderMPIInteraction[]
     */
    public function getRepairOrderMPIInteractions(): Collection
    {
        return $this->repairOrderMPIInteractions;
    }

    /**
     * @return Collection|InternalMessage[]
     */
    public function getInternalMessages(): Collection
    {
        return $this->internalMessages;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return bool
     */
    public function isTechnician()
    {
        return in_array('ROLE_TECHNICIAN', $this->getRoles());
    }

    /**
     * @return mixed
     */
    public function getTechnicianRepairOrders(): Collection
    {
        $criteria = Criteria::create()
                            ->andWhere(Criteria::expr()->eq('deleted', false))
                            ->orderBy(['dateCreated' => 'DESC']);

        $this->technicianRepairOrders->matching($criteria);
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
            $repairOrderInteraction->setUser($this);
        }

        return $this;
    }

    /**
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
            $repairOrderReviewInteraction->setUser($this);
        }

        return $this;
    }

    /*
     * @return Collection|RepairOrderTeam[]
     */
    public function getRepairOrderTeams(): Collection
    {
        return $this->repairOrderTeams;
    }

    public function addRepairOrderTeam(RepairOrderTeam $repairOrderTeam): self
    {
        if (!$this->repairOrderTeams->contains($repairOrderTeam)) {
            $this->repairOrderTeams[] = $repairOrderTeam;
            $repairOrderTeam->setUser($this);
        }

        return $this;
    }

    public function removeRepairOrderInteraction(RepairOrderInteraction $repairOrderInteraction): self
    {
        if ($this->repairOrderInteractions->contains($repairOrderInteraction)) {
            $this->repairOrderInteractions->removeElement($repairOrderInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderInteraction->getUser() === $this) {
                $repairOrderInteraction->setUser(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderReviewInteraction(RepairOrderReviewInteractions $repairOrderReviewInteraction): self
    {
        if ($this->repairOrderReviewInteractions->contains($repairOrderReviewInteraction)) {
            $this->repairOrderReviewInteractions->removeElement($repairOrderReviewInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderReviewInteraction->getUser() === $this) {
                $repairOrderReviewInteraction->setUser(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderTeam(RepairOrderTeam $repairOrderTeam): self
    {
        if ($this->repairOrderTeams->contains($repairOrderTeam)) {
            $this->repairOrderTeams->removeElement($repairOrderTeam);
            // set the owning side to null (unless already changed)
            if ($repairOrderTeam->getUser() === $this) {
                $repairOrderTeam->setUser(null);
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
            $serviceSM->setUser($this);
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

    public function addRepairOrderQuoteInteraction(RepairOrderQuoteInteraction $repairOrderQuoteInteraction): self
    {
        if (!$this->repairOrderQuoteInteractions->contains($repairOrderQuoteInteraction)) {
            $this->repairOrderQuoteInteractions[] = $repairOrderQuoteInteraction;
            $repairOrderQuoteInteraction->setUser($this);
        }

        return $this;
    }

    public function removeServiceSM(ServiceSMS $serviceSM): self
    {
        if ($this->serviceSMS->removeElement($serviceSM)) {
            // set the owning side to null (unless already changed)
            if ($serviceSM->getUser() === $this) {
                $serviceSM->setUser(null);
            }
        }

        return $this;
    }

    public function removeRepairOrderQuoteInteraction(RepairOrderQuoteInteraction $repairOrderQuoteInteraction): self
    {
        if ($this->repairOrderQuoteInteractions->contains($repairOrderQuoteInteraction)) {
            $this->repairOrderQuoteInteractions->removeElement($repairOrderQuoteInteraction);
            // set the owning side to null (unless already changed)
            if ($repairOrderQuoteInteraction->getUser() === $this) {
                $repairOrderQuoteInteraction->setUser(null);
            }
        }

        return $this;
    }

    public function getExternalAuthentication(): ?bool
    {
        return $this->externalAuthentication;
    }

    public function setExternalAuthentication(bool $externalAuthentication): self
    {
        $this->externalAuthentication = $externalAuthentication;

        return $this;
    }
}
