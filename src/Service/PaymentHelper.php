<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderPayment;
use App\Entity\RepairOrderPaymentInteraction;
use App\Exception\PaymentException;
use App\Money\MoneyHelper;
use Doctrine\ORM\EntityManagerInterface;
use Money\Money;

class PaymentHelper {
    private $em;
    private $nmi;

    public function __construct (EntityManagerInterface $em, NMI $nmi) {
        $this->em  = $em;
        $this->nmi = $nmi;
    }

    /**
     * @param RepairOrder $ro
     * @param Money       $amount
     *
     * @return RepairOrderPayment
     */
    public function addPayment (RepairOrder $ro, Money $amount): RepairOrderPayment {
        $payment = new RepairOrderPayment();
        $payment->setRepairOrder($ro)
                ->setAmount($amount)
                ->setDateCreated(new \DateTime());
        $this->commitPayment($payment);

        return $payment;
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
        $payment->setTransactionId($transactionId);
        $payment->setDatePaid(new \DateTime());

        try {
            $lookup = $this->nmi->lookupTransaction($transactionId);
            $payment->setCardType($lookup['transaction']['cc_type']);
            $payment->setCardNumber($lookup['transaction']['cc_number']);
        } catch (\Exception $e) {
            // TODO: Fail gracefully
        } finally {
            $this->commitPayment($payment);
        }
    }

    /**
     * @param RepairOrderPayment $payment
     * @param Money              $amount
     *
     * @throws \Exception|PaymentException
     */
    public function refundPayment (RepairOrderPayment $payment, Money $amount): void {
        $transactionId = $payment->getTransactionId();
        if ($transactionId === null) {
            throw new \InvalidArgumentException('Missing transactionId');
        }
        // TODO: Check amount

        $this->nmi->makeRefund($transactionId, $amount);
        $payment->setDateRefunded(new \DateTime())
                ->setRefundedAmount($amount);
        $this->commitPayment($payment);
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