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

	/**
     * @Rest\Post("/api/settings/upgrade_settings/create")
     *
     * @SWG\Tag(name="UpgradeSettings")
     * @SWG\Post(description="Create upgrade settings")
     * @SWG\Parameter(
     *     name="percentage_of_tax",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The percentage of tax to be paid on a trade in vehicle",
     * )
	 * @SWG\Parameter(
     *     name="limit_on_tax",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The limit on applicable tax to be paid on a trade in vehicle",
     * )
	 * @SWG\Parameter(
     *     name="total_days",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Total days until this offer expires",
     * )
	 * 
	 * @SWG\Parameter(
     *     name="website_url",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The website url to direct a user to obtain their instant cash offer",
     * )
	 * 
	 * @SWG\Parameter(
     *     name="upgrade_inital_text",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade Initial Text (Message that gets sent to a customer about their vehicle value. Limit 109 characters)",
     * )
	 * 
	 * @SWG\Parameter(
     *     name="upgrade_offer_text",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade Offer Text (Message that gets sent when a manager sends a cash offer to the customer. Limit 109 characters)",
     * )
	 * 
	 * @SWG\Parameter(
     *     name="upgrade_cash_offer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade cash offer copy",
     * )
	 * 
	 * @SWG\Parameter(
     *     name="upgrade_disclaimer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="Upgrade disclaimer",
     * )
	 * 
	 * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status": "Successfully created" }),
     *         )
     * )
	 * 
     *
     * @param Request                      $request
     *
     * @return JsonResponse
     */
	public function create (Request $request, EntityManagerInterface $em) {
			 
		$data = $request->request->all();
		foreach($data as $key => $value ){
			$upgrade_setting = new UpgradeSetting();
			$upgrade_setting->setName($key)
			 ->setValue($value);
			 
			$em->persist($upgrade_setting);
			$em->flush();
			$this->logInfo('New upgrade_setting "' . $key . '" "'.$value.'" Created');
		}

        return new JsonResponse([
            'status' => 'Successfully created!'
		]);
    }
}