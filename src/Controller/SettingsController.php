<?php

namespace App\Controller;

use App\Helper\iServiceLoggerTrait;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\UpgradeSetting;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\UpgradeSettingRepository;

/**
 * Class SettingsController
 *
 * @package App\Controller
 */
class SettingsController extends AbstractFOSRestController {
	use iServiceLoggerTrait;


}