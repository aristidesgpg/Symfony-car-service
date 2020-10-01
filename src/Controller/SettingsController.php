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

/**
 * Class SettingsController
 *
 * @package App\Controller
 */
class SettingsController extends AbstractFOSRestController {
    use iServiceLoggerTrait;
    
        /**
     * @Rest\Get("/api/settings/upgrade_settings")
     *
     * @SWG\Tag(name="Upgrade Settings")
     * @SWG\Get(description="Get upgrade settings")
     *
     *  @SWG\Response(
     *     response=200,
     *     description="Return upgrade settings",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="percentage_of_tax", type="string", description="The percentage of tax to be paid on a trade in vehicle", example="6.25"),
     *             @SWG\Property(property="limit_on_tax", type="string", description="The limit on applicable tax to be paid on a trade in vehicle", example="10000"),
     *             @SWG\Property(property="total_days", type="string", description="Total days until this offer expires", example="7"),
     *             @SWG\Property(property="website_url", type="string", description="The website url to direct a user to obtain their instant cash offer", example="https://www.performancetoyotastore.com/value-your-trade/"),
     *             @SWG\Property(property="upgrade_inital_text", type="string", description="Upgrade Initial Text (Message that gets sent to a customer about their vehicle value. Limit 109 characters)", example="Click the link below to see the value of your vehicle.  Thank you for visiting Performance Toyota"),
     *             @SWG\Property(property="upgrade_offer_text", type="string", description="Upgrade Offer Text (Message that gets sent when a manager sends a cash offer to the customer. Limit 109 characters)", example="Congratulations.  We have made you a cash offer.  Click the link to view."),
     *             @SWG\Property(property="upgrade_cash_offer", type="string", description="Upgrade cash offer copy", example="Show to any sales agent to claim your offer."),
     *             @SWG\Property(property="upgrade_disclaimer", type="string", description="Upgrade disclaimer", example="The cash offer is contingent upon verifying the condition and trim levels are true that were selected."),
     *         )
     * )
	 *
     * @return JsonResponse
     */
	public function getSettings (EntityManagerInterface $em) {
        
        $names = ["percentage_of_tax","limit_on_tax","total_days","website_url","upgrade_inital_text","upgrade_offer_text","upgrade_cash_offer","upgrade_disclaimer"];
        $upgrade_settings = array();
		foreach($names as $name ){
			$setting = $em->getRepository('App:UpgradeSetting')->findOneBy([ "name" => $name]);
			$value = $setting->getValue();
            
            $upgrade_setting[$name] = $value;
            
			$this->logInfo('get upgradeSetting "' . $name . '" "'.$value.'" ');
		}

        return new JsonResponse($upgrade_setting);
    }


	/**
     * @Rest\Post("/api/settings/upgrade_settings")
     *
     * @SWG\Tag(name="Upgrade Settings")
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
			$this->logInfo('New upgradeSetting "' . $key . '" "'.$value.'" Created');
		}

        return new JsonResponse([
            'status' => 'Successfully created!'
		]);
    }
   
    
    /**
     * @Rest\Patch("/api/settings/upgrade_settings")
     *
     * @SWG\Tag(name="Upgrade Settings")
     * @SWG\Patch(description="Update upgrade settings")
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
	public function update (Request $request, EntityManagerInterface $em) {
        
        // $settings = $this->getDoctrine()->getRepository(Admin::class)->find(1);
        // $introText = $settings->getIntroText();

		$data = $request->request->all();
		foreach($data as $key => $value ){
			$upgrade_setting = $em->getRepository('App:UpgradeSetting')->findOneBy([ "name" => $key]);
			$upgrade_setting->setValue($value);
			 
			$em->persist($upgrade_setting);
            $em->flush();
            
			$this->logInfo('Update upgradeSetting "' . $key . '" "'.$value.'" updated');
		}

        return new JsonResponse([
            'status' => 'Successfully updated!'
		]);
    }

    /**
     * @Rest\Delete("/api/settings/upgrade_settings")
     *
     * @SWG\Tag(name="Upgrade Settings")
     * @SWG\Delete(description="Remove upgrade settings")
	 * 
	 * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status": "Successfully removed" }),
     *         )
     * )
	 * 
     *
     *
     * @return JsonResponse
     */
	public function remove (EntityManagerInterface $em) {
        
        $names = ["percentage_of_tax","limit_on_tax","total_days","website_url","upgrade_inital_text","upgrade_offer_text","upgrade_cash_offer","upgrade_disclaimer"];
		foreach($names as $name ){
            $upgrade_setting = $em->getRepository('App:UpgradeSetting')->findOneBy([ "name" => $name]);
            if($upgrade_setting){
                $em->remove($upgrade_setting);
                
                $em->flush();
            }
            
			$this->logInfo('Remove upgradeSetting "' . $name .'" Removed');
		}

        return new JsonResponse([
            'status' => 'Successfully removed!'
		]);
    }
}