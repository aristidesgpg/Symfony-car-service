<?php

namespace App\Tests\Service;

use App\Entity\InternalMessage;
use App\Service\InternalMessageHelper;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InternalMessageHelperTest extends KernelTestCase
{

    /** @var InternalMessageHelper */
    private $internalMessageHelper;

    protected function setUp() {
        self::bootKernel();
        $this->internalMessageHelper = self::$container->get(InternalMessageHelper::class);
    }

    public function testUnReadMessagesCount() {
        $totalUnreadMessages = self::$container->get('doctrine')->getRepository(InternalMessage::class)->createQueryBuilder('im')
            ->where('im.to = :userId')
            ->orWhere('im.from = :userId')
            ->setParameter('userId', 3)
            ->andWhere('im.isRead = 0')
            ->select('count(im.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $this->assertEquals(97, $totalUnreadMessages);
    }

    public function testGetThreads() {
        $result = $this->internalMessageHelper->getThreads(3);

        $this->assertCount(49, $result);
    }

    protected function tearDown() {
        parent::tearDown();

        $this->internalMessageHelper = null;
    }
}
