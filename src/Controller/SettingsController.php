<?php

namespace App\Controller;

use App\Helper\iServiceLoggerTrait;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class SettingsController
 *
 * @package App\Controller
 */
class SettingsController extends AbstractFOSRestController {
	use iServiceLoggerTrait;
}