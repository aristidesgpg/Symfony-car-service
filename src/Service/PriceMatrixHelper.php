<?php

namespace App\Service;

use App\Entity\PriceMatrix;
use App\Repository\PriceMatrixRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class PriceMatrixHelper.
 */
class PriceMatrixHelper
{
    /** @var string[] */
    private const REQUIRED_FIELDS = ['hours', 'price'];

    /** @var EntityManagerInterface */
    private $em;

    /** @var PriceMatrixRepository */
    private $priceMatrixRepository;

    /**
     * PriceMatrixHelper constructor.
     */
    public function __construct(EntityManagerInterface $em, PriceMatrixRepository $priceMatrixRepository)
    {
        $this->em = $em;
        $this->priceMatrixRepository = $priceMatrixRepository;
    }

    public function createPriceMatrix(string $payload): void
    {
        $arr = $this->validateParams($payload);
        $allItems = $this->priceMatrixRepository->getAllItems();

        foreach ($allItems as $item) {
            $this->em->remove($item);
        }

        $this->em->flush();

        foreach ($arr as $item) {
            $priceMatrix = new PriceMatrix();
            $priceMatrix->setHours($item->hours)
                        ->setPrice($item->price);

            $this->em->persist($priceMatrix);
        }
        $this->em->flush();
    }

    /**
     * @return array Empty on successful validation
     */
    public function validateParams(string $payload): array
    {
        $obj = (array) json_decode($payload);

        if (is_null($obj) || !is_array($obj) || 0 === count($obj)) {
            throw new BadRequestHttpException('Payload data is invalid');
        }

        if (is_numeric($obj[0]->hours) && (0.00 != floatval($obj[0]->hours))) {
            throw new BadRequestHttpException('The first hours should always be 0.0');
        }

        $lastHours = floatval($obj[sizeof($obj) - 1]->hours);
        if (is_numeric($lastHours)) {
            $decimal = $lastHours - floor($lastHours);

            if (abs($decimal - 0.9) > PHP_FLOAT_EPSILON) {
                throw new BadRequestHttpException('The last hours should always be #.9');
            }
        }

        //check parameter validation
        $beforeHours = -0.1;
        foreach ($obj as $item) {
            if (!is_object($item)) {
                throw new BadRequestHttpException('Payload data is invalid');
            }

            if ($item->hours - $beforeHours != .1) {
                throw new BadRequestHttpException("The interval between $beforeHours and ".$item->hours.' is not 0.1');
            }

            $beforeHours = floatval($item->hours);
            $arr = get_object_vars($item);
            $keys = array_keys($arr);
            $requiredFields = ['hours', 'price'];

            foreach ($requiredFields as $key) {
                if (!in_array($key, $keys)) {
                    throw new BadRequestHttpException("Missing $key parameter");
                }

                if (!is_numeric($arr[$key])) {
                    throw new BadRequestHttpException("Invalid $key value");
                }
            }
        }

        return $obj;
    }
}
