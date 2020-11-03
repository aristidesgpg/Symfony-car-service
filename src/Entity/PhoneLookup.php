<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Twilio\Rest\Lookups\V1\PhoneNumberInstance;

/**
 * @ORM\Entity
 */
class PhoneLookup {
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=12)
     */
    private $phoneNumber;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carrierName;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $carrierType;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * PhoneLookup constructor.
     * @param PhoneNumberInstance $instance
     */
    public function __construct(PhoneNumberInstance $instance) {
        $this->phoneNumber = $instance->phoneNumber;
        $this->carrierName = $instance->carrier['name'];
        $this->carrierType = $instance->carrier['type'];
        $this->created = new \DateTime();
    }

    /**
     * @return string
     */
    public function getPhoneNumber (): string {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getCarrierName (): string {
        return $this->carrierName;
    }

    /**
     * @return string
     */
    public function getCarrierType (): string {
        return $this->carrierType;
    }

    /**
     * @return \DateTime
     */
    public function getCreated (): \DateTime {
        return $this->created;
    }
}