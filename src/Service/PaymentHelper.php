<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderPayment;
use App\Entity\RepairOrderPaymentInteraction;
use App\Exception\PaymentException;
use App\Money\MoneyHelper;
use App\Repository\SettingsRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use Money\Money;
use Throwable;
use Twilio\Exceptions\TwilioException;

/**
 * Class PaymentHelper.
 */
class PaymentHelper
{
    private $em;
    private $nmi;
    private $urlHelper;
    private $settings;
    private $mailer;
    private $twilio;
    private $customerUrl;

    /** @var string[] */
    private $validStatusesInOrder = [
        'Created',
        'Sent',
        'Viewed',
        'Paid',
        'Confirmed',
        'Refunded',
    ];

    private $hasPayments = false;

    /**
     * PaymentHelper constructor.
     */
    public function __construct(
        EntityManagerInterface $em,
        NMI $nmi,
        ShortUrlHelper $urlHelper,
        SettingsRepository $settings,
        MailerHelper $mailer,
        TwilioHelper $twilio,
        SettingsHelper $settingsHelper
    ) {
        $this->em = $em;
        $this->nmi = $nmi;
        $this->urlHelper = $urlHelper;
        $this->settings = $settings;
        $this->mailer = $mailer;
        $this->twilio = $twilio;
        $this->customerUrl = $settingsHelper->getSetting('customerURL');

        //TODO Find out what we should do if they don't have payments, Return null or exception?
        if ($this->settings->find('hasPayments')->getValue()) {
            $this->hasPayments = true;
        }
    }

    public function addPayment(RepairOrder $ro, Money $amount): RepairOrderPayment
    {
        $payment = new RepairOrderPayment();
        $payment->setRepairOrder($ro)
            ->setAmount($amount)
            ->setDateCreated(new DateTime())
            ->setStatus($this->statusCalculator('Created', $payment->getStatus()));
        $this->createInteraction($payment, 'Created');
        $this->commitPayment($payment);
        $this->updateRepairOrderStatus($payment);

        return $payment;
    }

    public function statusCalculator(string $desiredStatus, ?string $currentStatus): ?string
    {
        if (!in_array($desiredStatus, $this->getValidStatusesInOrder())) {
            return $currentStatus;
        }

        if (!$currentStatus) {
            return $desiredStatus;
        }

        $desiredStatusRank = array_search($desiredStatus, $this->getValidStatusesInOrder());
        $currentStatusRank = array_search($currentStatus, $this->getValidStatusesInOrder());

        if ($desiredStatusRank > $currentStatusRank) {
            return $desiredStatus;
        }

        return $currentStatus;
    }

    /**
     * @throws TwilioException
     */
    public function sendPayment(RepairOrderPayment $payment): void
    {
        $url = $this->customerUrl . $payment->getRepairOrder()->getLinkHash();
        $url = $this->urlHelper->generateShortUrl($url);
        $message = $this->settings->find('serviceTextPayment')->getValue() . ':' . $url;
        $customer = $payment->getRepairOrder()->getPrimaryCustomer();

        $this->twilio->sendSms($customer, $message);

        $payment->setDateSent(new DateTime());
        $payment->setStatus($this->statusCalculator('Sent', $payment->getStatus()));
        $this->createInteraction($payment, 'Sent');
        $this->commitPayment($payment);
    }

    public function viewPayment(RepairOrderPayment $payment, bool $paid = false): void
    {
        $date = new DateTime();
        if ($paid) {
            $payment->setDateConfirmed($date);
            $interaction = 'Paid Viewed';
        } else {
            $payment->setDateViewed($date);
            $interaction = 'Viewed';
        }
        $payment->setStatus($this->statusCalculator('Viewed', $payment->getStatus()));
        $this->createInteraction($payment, $interaction);
        $this->commitPayment($payment);
    }

    public function confirmPayment(RepairOrderPayment $payment): void
    {
        $interaction = 'Confirmed';
        $payment->setStatus($this->statusCalculator($interaction, $payment->getStatus()));
        $this->createInteraction($payment, $interaction);
        $payment->setDateConfirmed(new DateTime());
        $this->commitPayment($payment);
    }

    /**
     * @throws Exception|PaymentException
     */
    public function payPayment(RepairOrderPayment $payment, string $paymentToken): void
    {
        $response = $this->nmi->makePayment($paymentToken, $payment->getAmountString())->getParsedResponse();
        $transactionId = $response['transactionid'] ?? null;
        $payment->setTransactionId($transactionId);
        $payment->setDatePaid(new DateTime());
        $this->createInteraction($payment, 'Paid');
        $payment->setStatus($this->statusCalculator('Paid', $payment->getStatus()));
        try {
            $lookup = $this->nmi->lookupTransaction($transactionId);
            $payment->setCardType($lookup['transaction']['cc_type']);
            $payment->setCardNumber($lookup['transaction']['cc_number']);
        } catch (Exception $e) {
            // TODO: Fail gracefully
        } finally {
            $this->commitPayment($payment);
            $email = $payment->getRepairOrder()->getPrimaryCustomer()->getEmail();
            if ($email) {
                try {
                    $this->sendReceipt($payment, $email);
                } catch (Throwable $e) {
                    //do nothing.
                }
            }
        }
    }

    /**
     * @throws \Exception|PaymentException
     */
    public function refundPayment(RepairOrderPayment $payment, Money $amount): void
    {
        $transactionId = $payment->getTransactionId();
        if (null === $transactionId) {
            throw new InvalidArgumentException('Missing transactionId');
        }
        $overflow = $amount->greaterThan($payment->getAmount());
        if (null !== $payment->getRefundedAmount()) {
            $totalRefunded = $payment->getRefundedAmount()->add($amount);
            $overflow = $totalRefunded->greaterThan($payment->getAmount());
        }
        if (true === $overflow) {
            throw new InvalidArgumentException(sprintf('Refund amount "%s" exceeds total amount "%s"', MoneyHelper::getFormatter()->format($amount), MoneyHelper::getFormatter()->format($payment->getAmount())));
        }

        $this->nmi->makeRefund($transactionId, MoneyHelper::getFormatter()->format($amount));
        $payment->setDateRefunded(new DateTime())
            ->setRefundedAmount(isset($totalRefunded) ? $totalRefunded : $amount);
        $this->createInteraction($payment, 'Refunded');
        $payment->setStatus($this->statusCalculator('Refunded', $payment->getStatus()));
        $this->commitPayment($payment);
    }

    public function deletePayment(RepairOrderPayment $payment): void
    {
        if (null !== $payment->getDatePaid()) {
            throw new InvalidArgumentException('Paid payments cannot be deleted.');
        }
        if ($payment->isDeleted()) {
            throw new InvalidArgumentException('Payment already deleted.');
        }

        if ($payment->getDateRefunded()) {
            throw new InvalidArgumentException('Payment has been refunded.');
        }

        $payment->setDeleted(true);
        $payment->setDateDeleted(new DateTime());
        $this->createInteraction($payment, 'Deleted');
        $this->commitPayment($payment);
    }

    /**
     * @throws \Throwable
     */
    public function sendReceipt(RepairOrderPayment $payment, string $toAddress): void
    {
        $date = $payment->getDatePaid();
        if (null === $date) {
            throw new \InvalidArgumentException('Cannot send receipt for unpaid payment');
        }

        $dealerName = $this->settings->find('generalName')->getValue();

        $sent = $this->mailer->sendMailFromTemplate(
            "iService Auto {$dealerName} Payment Receipt",
            $toAddress,
            'email-payment-receipt.html.twig',
            [
                'dealer_name' => $dealerName,
                'customer_phone' => $payment->getRepairOrder()->getPrimaryCustomer()->getPhone(),
                'transaction_id' => $payment->getTransactionId(),
                'ro_number' => $payment->getRepairOrder()->getNumber(),
                'date' => $date,
                'amount' => $payment->getAmountString(),
            ]
        );

        if (!$sent) {
            throw new \RuntimeException('Could not send email');
        }

        $this->createInteraction($payment, 'Receipt sent');
        $this->commitPayment($payment);
    }

    private function createInteraction(RepairOrderPayment $payment, string $type): RepairOrderPaymentInteraction
    {
        $interaction = new RepairOrderPaymentInteraction();
        $interaction->setPayment($payment)
            ->setType($type);
        $payment->addInteraction($interaction);

        return $interaction;
    }

    private function commitPayment(RepairOrderPayment $payment): void
    {
        if (null === $payment->getId()) {
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

        $this->updateRepairOrderStatus($payment);
    }

    public function updateRepairOrderStatus(RepairOrderPayment $payment)
    {
        $repairOrder = $payment->getRepairOrder();
        $rops = $repairOrder->getPayments();
        $currentPaymentRank = array_search($payment->getStatus(), $this->getValidStatusesInOrder());

        //If it doesn't have a rank, then it's a deleted payment or invalid, so set the currentPaymentRank higher than all ranks.
        if (false === $currentPaymentRank || $payment->isDeleted()) {
            $currentPaymentRank = 10000;
        }
        foreach ($rops as $rop) {
            if ($rop->isDeleted()) {
                continue;
            }

            if (!$rop->getStatus()) {
                continue;
            }

            if ($rop->getId() == $payment->getId()) {
                continue;
            }

            $ropStatusRank = array_search($rop->getStatus(), $this->getValidStatusesInOrder());
            if ($ropStatusRank < $currentPaymentRank) {
                $currentPaymentRank = $ropStatusRank;
            }
        }

        if (10000 == $currentPaymentRank) {
            $repairOrder->setPaymentStatus('Not Started');
        } else {
            $repairOrder->setPaymentStatus($this->getValidStatusesInOrder()[$currentPaymentRank]);
        }

        $this->em->persist($repairOrder);

        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    public function getEm(): EntityManagerInterface
    {
        return $this->em;
    }

    public function setEm(EntityManagerInterface $em): void
    {
        $this->em = $em;
    }

    public function getNmi(): NMI
    {
        return $this->nmi;
    }

    public function setNmi(NMI $nmi): void
    {
        $this->nmi = $nmi;
    }

    public function getUrlHelper(): ShortUrlHelper
    {
        return $this->urlHelper;
    }

    public function setUrlHelper(ShortUrlHelper $urlHelper): void
    {
        $this->urlHelper = $urlHelper;
    }

    public function getSettings(): SettingsRepository
    {
        return $this->settings;
    }

    public function setSettings(SettingsRepository $settings): void
    {
        $this->settings = $settings;
    }

    public function getMailer(): MailerHelper
    {
        return $this->mailer;
    }

    public function setMailer(MailerHelper $mailer): void
    {
        $this->mailer = $mailer;
    }

    /**
     * @return string[]
     */
    public function getValidStatusesInOrder(): array
    {
        return $this->validStatusesInOrder;
    }

    /**
     * @param string[] $validStatusesInOrder
     */
    public function setValidStatusesInOrder(array $validStatusesInOrder): void
    {
        $this->validStatusesInOrder = $validStatusesInOrder;
    }
}
