<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

trait InteractionTrait {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"int_list"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $customer;

    /**
     * @ORM\Column(type="integer")
     * @Serializer\Groups(groups={"int_list"})
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups(groups={"int_list"})
     */
    private $date;

    public function __construct() {
        $this->date = new \DateTime();
    }

    /**
     * @return int|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    /**
     * @return User|null
     */
    public function getUser (): ?User {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return self
     */
    public function setUser (User $user): self {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer (): ?Customer {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return InteractionTrait
     */
    public function setCustomer (Customer $customer) {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return int
     */
    public function getType (): int {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return self
     */
    public function setType (int $type): self {
        $this->type = $type;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate (): \DateTime {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return self
     */
    public function setDate (\DateTime $date): self {
        $this->date = $date;

        return $this;
    }
}