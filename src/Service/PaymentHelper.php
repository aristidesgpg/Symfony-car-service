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
        $this->createInteraction($payment, 'Created');
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
        $response      = $this->nmi->makePayment($paymentToken, $payment->getAmountString())->getParsedResponse();
        $transactionId = $response['transaction_id'] ?? null;
        $payment->setTransactionId($transactionId);
        $payment->setDatePaid(new \DateTime());
        $this->createInteraction($payment, 'Paid');

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
        $overflow = $amount->greaterThan($payment->getAmount());
        if ($payment->getRefundedAmount() !== null) {
            $totalRefunded = $payment->getRefundedAmount()->add($amount);
            $overflow = $totalRefunded->greaterThan($payment->getAmount());
        }
        if ($overflow === true) {
            throw new \InvalidArgumentException(sprintf('Refund amount "%s" exceeds total amount "%s"',
                MoneyHelper::getFormatter()->format($amount),
                MoneyHelper::getFormatter()->format($payment->getAmount())
            ));
        }

        $this->nmi->makeRefund($transactionId, $amount);
        $payment->setDateRefunded(new \DateTime())
                ->setRefundedAmount(isset($totalRefunded) ? $totalRefunded : $amount);
        $this->createInteraction($payment, 'Refunded');
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
        $this->createInteraction($payment, 'Deleted');

        $this->commitPayment($payment);
    }

    private function createInteraction (RepairOrderPayment $payment, string $type): RepairOrderPaymentInteraction {
        $interaction = new RepairOrderPaymentInteraction();
        $interaction->setPayment($payment)
                    ->setType($type);
        $payment->addInteraction($interaction);

        return $interaction;
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