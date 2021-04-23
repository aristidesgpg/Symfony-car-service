<?php

namespace App\Service;

use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderRepository;

class ROLinkHashHelper
{
    use iServiceLoggerTrait;

    /**
     * @var string
     */
    private $hash;

    private $repo;

    public function __construct(RepairOrderRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Generate an RO Hash.
     * @param string $dateCreated
     * @return string
     */
    public function generate(string $dateCreated): string
    {
        try {
            $hash = sha1($dateCreated.random_bytes(32));
        } catch (\Exception $e) { // Shouldn't ever happen
            throw new \RuntimeException('Could not generate random bytes. The server is broken.', 0, $e);
        }
        $ro = $this->repo->findByHash($hash);
        if (null !== $ro) { // Very unlikely
            $this->logger->warning('link hash collision');

            return $this->generate($dateCreated); //This is a never ending loop.
        }

        return $hash;
    }

    /**
     * @return mixed
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return RepairOrderRepository
     */
    public function getRepo(): RepairOrderRepository
    {
        return $this->repo;
    }

    /**
     * @param RepairOrderRepository $repo
     */
    public function setRepo(RepairOrderRepository $repo): void
    {
        $this->repo = $repo;
    }


}
