<?php

namespace App\Service;

use App\Entity\RepairOrderPayment;
use App\Entity\RepairOrderPaymentInteraction;
use App\Exception\PaymentException;
use Doctrine\ORM\EntityManagerInterface;

class PaymentHelper {
    private $em;
    private $nmi;

    public function __construct (EntityManagerInterface $em, NMI $nmi) {
        $this->em  = $em;
        $this->nmi = $nmi;
    }

    /**
     * @param RepairOrderPayment $payment
     * @param string             $paymentToken
     *
     * @throws \Exception|PaymentException
     */
    public function payPayment (RepairOrderPayment $payment, string $paymentToken): void {
        $response      = $this->nmi->makePayment($paymentToken, $payment->getAmount())->getParsedResponse();
        $transactionId = $response['transaction_id'] ?? null;
    }

    public function deletePayment (RepairOrderPayment $payment): void {
        if ($payment->getDatePaid() !== null) {
            throw new \InvalidArgumentException("Paid payments cannot be deleted");
        }
        if ($payment->isDeleted()) {
            throw new \InvalidArgumentException("Payment already deleted");
        }

        $payment->setDeleted(true);
        $payment->setDateDeleted(new \DateTime());
        $interaction = new RepairOrderPaymentInteraction();
        $interaction->setPayment($payment);
        $interaction->setType('Deleted');
        $payment->addInteraction($interaction);

        $this->commitPayment($payment);
    }

    private function commitPayment (RepairOrderPayment $payment): void {
        if ($payment->getId() === null) {
            $this->em->persist($payment);
        }

        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }
}