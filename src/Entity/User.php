<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *
 * @TODO: Look into doctrine event subscriber for automatically doing things when entities are created/updated
 *        'composer require antishov/doctrine-extensions-bundle'
 *        'https://symfonycasts.com/screencast/symfony4-doctrine/sluggable#play'
 */
class User implements UserInterface {
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
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
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $certification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     */
    private $lastLogin;

    /**
     * @ORM\Column(type="boolean")
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pin;

    /**
     * User constructor.
     */
    public function __construct () {
        $this->technicianRepairOrders = new ArrayCollection();
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
     * @return string|null
     */
    public function getEmail (): ?string {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail (string $email): self {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone (): ?string {
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
     * @return string|null
     */
    public function getExtension (): ?string {
        return $this->extension;
    }

    /**
     * @param string|null $extension
     *
     * @return $this
     */
    public function setExtension (?string $extension): self {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword (): ?string {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword (string $password): self {
        $this->password = $password;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles () {
        return [$this->role];
    }

    /**
     * @param string $role
     *
     * @return User
     */
    public function setRole (string $role) {
        $this->role = $role;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCertification (): ?string {
        return $this->certification;
    }

    /**
     * @param string|null $certification
     *
     * @return $this
     */
    public function setCertification (?string $certification): self {
        $this->certification = $certification;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExperience (): ?string {
        return $this->experience;
    }

    /**
     * @param string|null $experience
     *
     * @return $this
     */
    public function setExperience (?string $experience): self {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecurityQuestion (): ?string {
        return $this->securityQuestion;
    }

    /**
     * @param string|null $securityQuestion
     *
     * @return $this
     */
    public function setSecurityQuestion (?string $securityQuestion): self {
        $this->securityQuestion = $securityQuestion;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecurityAnswer (): ?string {
        return $this->securityAnswer;
    }

    /**
     * @param string|null $securityAnswer
     *
     * @return $this
     */
    public function setSecurityAnswer (?string $securityAnswer): self {
        $this->securityAnswer = $securityAnswer;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getPreviewDeviceTokens (): ?array {
        return $this->previewDeviceTokens;
    }

    /**
     * @param array|null $previewDeviceTokens
     *
     * @return $this
     */
    public function setPreviewDeviceTokens (?array $previewDeviceTokens): self {
        $this->previewDeviceTokens = $previewDeviceTokens;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getForceAuthentication (): ?bool {
        return $this->forceAuthentication;
    }

    /**
     * @param bool $forceAuthentication
     *
     * @return $this
     */
    public function setForceAuthentication (bool $forceAuthentication): self {
        $this->forceAuthentication = $forceAuthentication;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastLogin (): DateTime {
        return $this->lastLogin;
    }

    /**
     * @param DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin (DateTime $lastLogin): self {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActive (): ?bool {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return $this
     */
    public function setActive (bool $active): self {
        $this->active = $active;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTechnicianRepairOrders (): Collection {
        $criteria = Criteria::create()
                            ->andWhere(Criteria::expr()->eq('deleted', false))
                            ->orderBy(['dateCreated' => 'DESC']);

        $this->technicianRepairOrders->matching($criteria);
    }

    public function getSalt () {
        // TODO: Implement getSalt() method.
    }

    public function getUsername () {
        return $this->email;
    }

    public function eraseCredentials () {
        // TODO: Implement eraseCredentials() method.
    }

    public function getPin (): ?string {
        return $this->pin;
    }

    public function setPin (string $pin): self {
        $this->pin = $pin;

        return $this;
    }

}
