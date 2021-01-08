<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Exception;

/**
 * Class PhoneValidator.
 */
class PhoneValidator
{
    /**
     * @var TwilioHelper
     */
    private $twilio;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * PhoneValidator constructor.
     */
    public function __construct(TwilioHelper $twilio, EntityManagerInterface $em)
    {
        $this->twilio = $twilio;
        $this->em = $em;
    }

    /**
     * @return string
     *
     * @throws Exception
     */
    public function clean(string $phone)
    {
        // Remove +1 if it's there. Remove non-integers
        $phone = ltrim($phone, '+1');
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Wasn't a +1, but there was an extra 1
        if (strlen($phone) > 10) {
            $phone = ltrim($phone, '1');
        }

        if ($phone > 10) {
            $phone = substr($phone, 0, 10);
        }

        // Should only be 10 chars 8475551234
        if (10 != strlen($phone)) {
            throw new Exception('Invalid Phone Number: '.$phone);
        }

        return $phone;
    }

    public function isMobile(string $phone): bool
    {
        $lookup = $this->twilio->lookupNumber($phone);

        return 'mobile' === $lookup->getCarrierType();
    }
}
