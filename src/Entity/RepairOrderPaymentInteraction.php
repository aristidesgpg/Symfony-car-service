<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RepairOrderPaymentInteraction
{
    public const GROUPS = ['int_list', 'user_list', 'customer_list'];

    use InteractionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrderPayment")
     */
    private $repairOrderPayment;

    /**
     * @return $this
     */
    public function setPayment(RepairOrderPayment $payment): self
    {
        $this->repairOrderPayment = $payment;

        return $this;
    }

    public function getPayment(): RepairOrderPayment
    {
        return $this->repairOrderPayment;
    }
}
