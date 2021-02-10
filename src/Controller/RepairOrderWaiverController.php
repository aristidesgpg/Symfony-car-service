<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Repository\RepairOrderRepository;
use App\Response\ValidationResponse;
use App\Service\SettingsHelper;
use App\Service\ShortUrlHelper;
use App\Service\TwilioHelper;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Rest\Route("/api/repair-order-waiver")
 * @SWG\Tag(name="Repair Order Waiver")
 */
class RepairOrderWaiverController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/signed")
     *
     * @SWG\Parameter(name="signature", type="string", in="formData", required=true)
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Return updated RepairOrder",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Missing required parameter(s)"
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Repair order not found"
     * )
     *
     * @return Response
     * @throws Exception
     */
    public function waiverSigned(
        Request $req,
        RepairOrderRepository $roRepo,
        SettingsHelper $settingsHelper,
        TwilioHelper $twilioHelper,
        EntityManagerInterface $em
    ) {
        $signature = $req->get('signature');
        $repairOrderId = $req->get('repairOrderId');

        if (!$signature || !$repairOrderId) {
            return $this->handleView($this->view('Missing required parameter(s)', Response::HTTP_BAD_REQUEST));
        }

        $ro = $roRepo->find($repairOrderId);

        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        if (!empty($ro->getWaiverSignature())) {
            throw new NotAcceptableHttpException('Waiver has already been signed');
        }

        // Invalid image
        if (!base64_decode($signature)) {
            return $this->handleView($this->view('Invalid base64 image', Response::HTTP_BAD_REQUEST));
        }

        $ro->setWaiverSignature($signature);
        $em->persist($ro);
        $em->flush();

        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setCustomer($ro->getPrimaryCustomer())
                      ->setType('Waiver Signed')
                      ->setDate();

        $em->persist($roInteraction);
        $em->flush();

        $welcomeMessage = $settingsHelper->getSetting('serviceTextIntro');
        try {
            $twilioHelper->sendSms($ro->getPrimaryCustomer()->getPhone(), $welcomeMessage);
        } catch (Exception $e) {
            // Nothing, waiver was signed but we didn't send a welcome message for some reason
        }

        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/viewed")
     * @SWG\Post(description="Add an interaction Waiver Viewed")
     *
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Return RepairOrderInteraction",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderInteraction::class, groups=RepairOrderInteraction::GROUPS))
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Missing required parameter(s)"
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Repair order not found"
     * )
     *
     * @return response
     */
    public function waiverViewed(
        Request $request,
        RepairOrderRepository $roRepo,
        EntityManagerInterface $em
    ) {
        $repairOrderId = $request->get('repairOrderId');

        if (!$repairOrderId) {
            return $this->handleView($this->view('Missing required parameter', Response::HTTP_BAD_REQUEST));
        }

        $ro = $roRepo->find($repairOrderId);

        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        if (!empty($ro->getWaiverSignature())) {
            throw new NotAcceptableHttpException('Waiver has already been signed');
        }

        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setCustomer($ro->getPrimaryCustomer())
                      ->setType('Waiver Viewed');
        $em->persist($roInteraction);
        $em->flush();

        $view = $this->view($roInteraction);
        $view->getContext()->setGroups(RepairOrderInteraction::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/acknowledged")
     * @SWG\Post(description="Add an interaction Waiver Acknowledged")
     *
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Return RepairOrderInteraction",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderInteraction::class, groups=RepairOrderInteraction::GROUPS))
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Missing required parameter(s)"
     * )
     * @SWG\Response(
     *     response="404",
     *     description="Repair order not found"
     * )
     *
     * @return response
     * @throws Exception
     */
    public function waiverAcknowledged(
        Request $request,
        RepairOrderRepository $roRepo,
        SettingsHelper $settingsHelper,
        EntityManagerInterface $em
    ) {
        $repairOrderId = $request->get('repairOrderId');

        if (!$repairOrderId) {
            return $this->handleView($this->view('Missing required parameter', Response::HTTP_BAD_REQUEST));
        }

        $ro = $roRepo->find($repairOrderId);

        if (!$ro || $ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        if (!empty($ro->getWaiverSignature())) {
            throw new NotAcceptableHttpException('Waiver has already been signed');
        }

        // Set the verbiage they agreed to
        $waiverVerbiage = $settingsHelper->getSetting('waiverEstimateText');
        $ro->setWaiverVerbiage($waiverVerbiage);
        $em->persist($ro);
        $em->flush();

        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setCustomer($ro->getPrimaryCustomer())
                      ->setType('Waiver Acknowledged');

        $em->persist($roInteraction);
        $em->flush();

        $view = $this->view($roInteraction);
        $view->getContext()->setGroups(RepairOrderInteraction::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/re-send")
     * @SWG\Post(description="Add an interaction Waiver Resend")
     *
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Add an interaction Waiver Resent",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderInteraction::class, groups=RepairOrderInteraction::GROUPS))
     * )
     * @SWG\Response(response="400", description="Waiver is already signed")
     * @SWG\Response(response="404", description="Repair order not found")
     *
     * @return response
     * @throws Exception
     */
    public function waiverResend(
        Request $request,
        RepairOrderRepository $roRepo,
        SettingsHelper $settingsHelper,
        EntityManagerInterface $em,
        ParameterBagInterface $parameterBag,
        ShortUrlHelper $shortUrlHelper
    ) {
        $repairOrderId = $request->get('repairOrderId');
        $waiverActivateAuthMessage = $settingsHelper->getSetting('waiverActivateAuthMessage');
        $waiverIntroText = $settingsHelper->getSetting('waiverIntroText');
        $customerURL = $parameterBag->get('customer_url');

        if (!$repairOrderId) {
            return $this->handleView($this->view('Missing required parameter', Response::HTTP_BAD_REQUEST));
        }

        $ro = $roRepo->find($repairOrderId);

        if (!$ro || $ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        if (!empty($ro->getWaiverSignature())) {
            throw new NotAcceptableHttpException('Waiver has already been signed');
        }

        if (!$waiverActivateAuthMessage) {
            throw new NotAcceptableHttpException('Waiver is not enabled');
        }

        // Send it out
        $url = $customerURL.$ro->getLinkHash();
        $shortUrl = $shortUrlHelper->generateShortUrl($url);
        try {
            $phone = $ro->getPrimaryCustomer()->getPhone();
            $shortUrlHelper->sendShortenedLink($phone, $waiverIntroText, $shortUrl, true);
        } catch (Exception $e) {
            throw new Exception($e);
        }

        // Add an interaction Waiver Resent
        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setUser($this->getUser())
                      ->setType('Waiver Sent');

        $em->persist($roInteraction);
        $em->flush();

        $view = $this->view($roInteraction);
        $view->getContext()->setGroups(RepairOrderInteraction::GROUPS);

        return $this->handleView($view);
    }
}
