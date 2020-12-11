<?php

namespace App\Service;

use App\Entity\ThirdPartyAPILog;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException as Exception;
use DateTime;

class ThirdPartyAPILogHelper {

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function commitAPILog($endpoint, $soapAction, $response, $isRest = true) {

        // Delete old logs
        $twoDaysAgo  = (new DateTime())->modify('-2 days');
        $deleteQuery = $this->em->createQueryBuilder()
                            ->delete('App:ThirdPartyAPILog', 's')
                            ->where('s.date < :twoDaysAgo')
                            ->setParameter('twoDaysAgo', $twoDaysAgo)
                            ->getQuery();
        $deleteQuery->execute();

        // Insert a new log
        $log = new ThirdPartyAPILog();

        if ($isRest) {
            $log->setEndpoint($endpoint);
        } else {
            $log->setSoapAction($soapAction);
        }

        $log->setResponse($response);
        $log->setDate(new DateTime());

        $this->em->persist($log);
        $this->em->beginTransaction();

        try {
            $this->em->flush();
            $this->em->commit();
        } catch(Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }
}

?>