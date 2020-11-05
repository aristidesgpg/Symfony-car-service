<?php

namespace App\Controller;

use App\Entity\MPITemplate;
use App\Entity\InspectionGroup;
use App\Entity\MPIItem;
use App\Helper\iServiceLoggerTrait;
use App\Repository\MPITemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class MPITemplateController
 *
 * @package App\Controller
 */
class MPITemplateController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

}
