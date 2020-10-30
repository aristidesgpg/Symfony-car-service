<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations as Rest;

use App\Entity\OperationCode;
use App\Repository\OperationCodeRepository;
use Doctrine\ORM\EntityManagerInterface;


class OperationCodeController extends AbstractFOSRestController
{
    
}
