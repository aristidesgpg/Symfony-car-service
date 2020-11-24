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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carrierName;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $carrierType;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * PhoneLookup constructor.
     * @param string                   $phoneNumber
     * @param PhoneNumberInstance|null $instance
     */
    public function __construct(string $phoneNumber, ?PhoneNumberInstance $instance = null) {
        $this->phoneNumber = $phoneNumber;
        $this->created = new \DateTime();
        if ($instance !== null) {
            $this->carrierName = $instance->carrier['name'];
            $this->carrierType = $instance->carrier['type'];
        }
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
    public function getCarrierName (): ?string {
        return $this->carrierName;
    }

    /**
     * @return string
     */
    public function getCarrierType (): ?string {
        return $this->carrierType;
    }

    /**
     * @return \DateTime
     */
    public function getCreated (): \DateTime {
        return $this->created;
    }
}