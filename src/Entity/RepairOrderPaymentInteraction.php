<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class RepairOrderPaymentInteraction {
    public const GROUPS = ['int_list'];

    use InteractionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RepairOrderPayment")
     */
    private $repairOrderPayment;

    /**
     * @param RepairOrderPayment $payment
     *
     * @return $this
     */
    public function setPayment (RepairOrderPayment $payment): self {
        $this->repairOrderPayment = $payment;

        return $this;
    }

    /**
     * @return RepairOrderPayment
     */
    public function getPayment (): RepairOrderPayment {
        return $this->repairOrderPayment;
    }
}