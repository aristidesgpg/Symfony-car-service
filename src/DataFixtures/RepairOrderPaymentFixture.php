<?php

namespace App\DataFixtures;

use App\Entity\RepairOrderPayment;
use App\Entity\RepairOrderPaymentInteraction;
use App\Money\MoneyHelper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RepairOrderPaymentFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i < 51; ++$i) {
            $ro = $this->getReference("repairOrder_{$i}");
            $created = $faker->dateTimeThisYear;
            $payment = new RepairOrderPayment();
            $payment->setAmount(MoneyHelper::parse(rand(1, 2000).'.'.rand(10, 99)))
                    ->setRepairOrder($ro)
                    ->setDateCreated($created);
            $this->addInteraction('Created', $payment, $created);
            if (rand(1, 4) > 1) {
                $dayInterval = new \DateInterval('P1D');
                $minInterval = new \DateInterval('PT1M');

                $sent = (clone $created)->add($dayInterval);
                $payment->setDateSent($sent);
                $this->addInteraction('Sent', $payment, $sent);

                $viewed = (clone $sent)->add($minInterval);
                $payment->setDateViewed($viewed);
                $this->addInteraction('Viewed', $payment, $viewed);

                $paid = (clone $viewed)->add($dayInterval);
                $payment->setTransactionId($faker->sha1);
                $payment->setDatePaid($paid);
                $this->addInteraction('Paid', $payment, $paid);

                $paidViewed = (clone $paid)->add($minInterval);
                $payment->setDatePaidViewed($paidViewed);
                $this->addInteraction('Paid Viewed', $payment, $paidViewed);

                $receiptSent = (clone $paidViewed)->add($minInterval);
                $this->addInteraction('Receipt sent', $payment, $receiptSent);

                if (1 === rand(1, 4)) {
                    $refunded = (clone $paid)->add($dayInterval);
                    $payment->setDateRefunded($refunded);

                    $payment->setRefundedAmount($payment->getAmount());
                    $this->addInteraction('Refunded', $payment, $refunded);
                }
            }
            $manager->persist($payment);
        }
        $manager->flush();
    }

    private function addInteraction(string $type, RepairOrderPayment $payment, \DateTime $date): void
    {
        $interaction = new RepairOrderPaymentInteraction();
        $interaction->setPayment($payment)
            ->setType($type)
            ->setDate($date);
        $payment->addInteraction($interaction);
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            RepairOrderFixture::class,
        ];
    }
}
