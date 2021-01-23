<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderInteraction;
use App\Repository\RepairOrderInteractionRepository;
use App\Repository\RepairOrderRepository;
use App\Response\ValidationResponse;
use App\Service\RepairOrderHelper;
use App\Service\SettingsHelper;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Rest\Route("/api/repair-order-waiver")
 * @SWG\Tag(name="Repair Order Waiver")
 */
class RepairOrderWaiverController extends AbstractFOSRestController
{
    /**
     * @Rest\Patch("/waiver/signed")
     *
     * @SWG\Parameter(name="signature", type="string", in="formData", required=true)
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     * @SWG\Response(
     *     response="200",
     *     description="Return updated RepairOrder object",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrder::class, groups=RepairOrder::GROUPS))
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Required missing parameter",
     * )
     *
     * @return Response
     */
    public function waiverSigned(
        RepairOrder $ro,
        Request $req,
        RepairOrderHelper $helper,
        SettingsHelper $settingsHelper,
        EntityManagerInterface $em
    ) {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $signature = $req->get('signature');

        if (!$signature) {
            return $this->handleView($this->view('Input signature', Response::HTTP_BAD_REQUEST));
        }

        $pattern = "/^\s*([a-z]+\/[a-z0-9\-\+]+(;[a-z\-]+\=[a-z0-9\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i";
        if (!preg_match($pattern, $signature)) {
            return $this->handleView($this->view('Input valid signature (base64 svg)', Response::HTTP_BAD_REQUEST));
        }

        $waiverText = $settingsHelper->getSetting('waiverEstimateText');

        $errors = $helper->updateRepairOrder(['waiver' => $signature, 'waiverVerbiage' => $waiverText], $ro);
        if (!empty($errors)) {
            return new ValidationResponse($errors);
        }

        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setCustomer($ro->getPrimaryCustomer())
                      ->setUser($this->getUser())
                      ->setType("Waiver Signed")
                      ->setDate();
   
        $em->persist($roInteraction);
        $em->flush();

        // $welcomeMessage = $settingsHelper->getSetting('previewSalesVideoText');

        // $twilioHelper->sendSms($ro->getPrimaryCustomer->getPhone(), $welcomeMessage);

        $view = $this->view($ro);
        $view->getContext()->setGroups(RepairOrder::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/waiver/viewed")
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Add an interaction Waiver Viewed",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderInteraction::class, groups=RepairOrderInteraction::GROUPS))
     * )
     *
     * @param Request                $request
     * @param RepairOrder            $ro
     * @param EntityManagerInterface $em
     *
     * @return response
     */
    public function waiverViewed(
        RepairOrder $ro,
        EntityManagerInterface $em
    ) {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setCustomer($ro->getPrimaryCustomer())
                      ->setType("Waiver Viewed")
                      ->setDate();
        $em->persist($roInteraction);
        $em->flush();

        $view = $this->view($roInteraction);
        $view->getContext()->setGroups(RepairOrderInteraction::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/waiver/acknowledged")
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Add an interaction Waiver Acknowledged",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderInteraction::class, groups=RepairOrderInteraction::GROUPS))
     * )
     *
     * @param Request                $request
     * @param RepairOrder            $ro
     * @param EntityManagerInterface $em
     *
     * @return response
     */
    public function waiverAcknowledged(
        RepairOrder $ro,
        EntityManagerInterface $em
    ) {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $roInteraction = new RepairOrderInteraction();
        $roInteraction->setRepairOrder($ro)
                      ->setCustomer($ro->getPrimaryCustomer())
                      ->setUser($this->getUser())
                      ->setType("Waiver Acknowledged")
                      ->setDate();

        $em->persist($roInteraction);
        $em->flush();

        $view = $this->view($roInteraction);
        $view->getContext()->setGroups(RepairOrderInteraction::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post("/waiver/re-send")
     * @SWG\Parameter(name="repairOrderId", type="integer", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Add an interaction Waiver Resent",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderInteraction::class, groups=RepairOrderInteraction::GROUPS))
     * )
     * @SWG\Response(response="400", description="Waiver is already signed")
     *
     * @param Request                          $request
     * @param RepairOrder                      $ro
     * @param RepairOrderInteractionRepository $roInteractionRepo
     * @param EntityManagerInterface           $em
     *
     * @return response
     */
    public function waiverResend(
        RepairOrder $ro,
        RepairOrderInteractionRepository $roInteractionRepo,
        EntityManagerInterface $em
    ) {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        // Add an interaction Waiver Resent
        $roInteraction = $roInteractionRepo->findOneBy(
            ['repairOrder' => $ro->getId(), 'customer' => $ro->getPrimaryCustomer()->getId()]
        );

        if ($roInteraction) {
            if ($roInteraction->getType() === "Waiver Signed") {
                return $this->handleView($this->view('Waiver is already signed', Response::HTTP_BAD_REQUEST));
            }
            $roInteraction->setType("Waiver Resent");
        } else {
            $roInteraction = new RepairOrderInteraction();
            $roInteraction->setRepairOrder($ro)
                          ->setCustomer($ro->getPrimaryCustomer())
                          ->setUser($this->getUser())
                          ->setType("Waiver Resent")
                          ->setDate();
        }
        $em->persist($roInteraction);
        $em->flush();

        $view = $this->view($roInteraction);
        $view->getContext()->setGroups(RepairOrderInteraction::GROUPS);

        return $this->handleView($view);
    }
}
