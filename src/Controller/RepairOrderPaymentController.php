<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\RepairOrderPayment;
use App\Exception\PaymentException;
use App\Helper\FalsyTrait;
use App\Money\MoneyHelper;
use App\Repository\RepairOrderPaymentRepository;
use App\Repository\RepairOrderRepository;
use App\Response\ValidationResponse;
use App\Service\PaymentHelper;
use App\Service\RepairOrderHelper;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use InvalidArgumentException;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Twilio\Exceptions\TwilioException;

/**
 * Class RepairOrderPaymentController.
 *
 * @Rest\Route("/api/repair-order-payment")
 * @SWG\Tag(name="Repair Order Payment")
 * @SWG\Response(
 *     response="404",
 *     description="Repair Order or Payment does not exist"
 * )
 * @SWG\Response(
 *     response="401",
 *     description="Not Authorized."
 * )
 */
class RepairOrderPaymentController extends AbstractFOSRestController
{
    use FalsyTrait;

    /**
     * @Rest\Get
     *
     * @SWG\Parameter(
     *     name="repairOrderId",
     *     in="query",
     *     type="integer",
     *     description="Repair Order ID",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     *     )
     * )
     */
    public function getPaymentsForRO(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        RepairOrderHelper $repairOrderHelper
    ): Response {
        $repairOrderId = $request->get('repairOrderId');
        // check if params are valid
        if (!$repairOrderId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $ro = $repairOrderRepository->findByUID($repairOrderId);
        if (!$ro) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($ro->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }

        $payments = $ro->getPayments();
        foreach ($payments as $key => $payment) {
            if ($payment->isDeleted()) {
                unset($payments[$key]);
            }
        }
        $view = $this->view($payments);
        $view->getContext()->setGroups(['rop_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post
     *
     * @SWG\Parameter(
     *     name="repairOrderId",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID"
     * )
     * @SWG\Parameter(name="amount", type="string", in="formData", required=true)
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     */
    public function createPayment(
        Request $request,
        PaymentHelper $helper,
        RepairOrderRepository $repairOrderRepository
    ): Response {
        $repairOrderId = $request->get('repairOrderId');

        // check if params are valid
        if (!$repairOrderId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $ro = $repairOrderRepository->findByUID($repairOrderId);
        if (!$ro) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        try {
            $amount = MoneyHelper::parseAmount($request->request->get('amount'));
        } catch (InvalidArgumentException $e) {
            return new ValidationResponse(['amount' => $e->getMessage()]);
        }

        $payment = $helper->addPayment($ro, $amount);

        $view = $this->view($payment);
        $view->getContext()->setGroups(['rop_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{id}")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     * )
     */
    public function getPaymentAndInteractions(RepairOrderPayment $payment): Response
    {
        if ($payment->getRepairOrder()->getDeleted() || $payment->isDeleted()) {
            throw new NotFoundHttpException();
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($payment->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }
        $view = $this->view($payment);
        $view->getContext()->setGroups(['int_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Paid payments cannot be deleted")
     */
    public function delete(RepairOrderPayment $id, PaymentHelper $helper): Response
    {
        if ($id->getRepairOrder()->getDeleted() || $id->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if (null !== $id->getDatePaid()) {
            return $this->handleView(
                $this->view(
                    [
                        'message' => 'Paid payments cannot be deleted',
                    ],
                    Response::HTTP_BAD_REQUEST
                )
            );
        }

        $helper->deletePayment($id);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Payment deleted',
                ]
            )
        );
    }

    /**
     * @Rest\Post("/send")
     *
     * @SWG\Parameter(
     *     name="repairOrderPaymentId",
     *     type="integer",
     *     in="formData",
     *     description="Repair Order Payment ID",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Payment already sent")
     * @SWG\Response(response="500", description="Unable to send payment")
     */
    public function sendPayment(
        Request $request,
        PaymentHelper $helper,
        RepairOrderPaymentRepository $repairOrderPaymentRepository
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $repairOrderPaymentRepository->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order Payment not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        try {
            $helper->sendPayment($rop);
        } catch (TwilioException $e) {
            return $this->handleView(
                $this->view(
                    [
                        'message' => 'Unable to send payment',
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                )
            );
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Payment sent',
                ]
            )
        );
    }

    /**
     * @Rest\Post("/view")
     *
     * @SWG\Parameter(
     *     name="repairOrderPaymentId",
     *     type="integer",
     *     in="formData",
     *     description="Repair Order Payment ID",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     */
    public function viewPayment(
        Request $request,
        RepairOrderPaymentRepository $repairOrderPaymentRepository,
        PaymentHelper $helper
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $repairOrderPaymentRepository->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order Payment not found');
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($rop->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        $paid = (null !== $rop->getDatePaid());
        $helper->viewPayment($rop, $paid);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Payment view recorded',
                ]
            )
        );
    }

    /**
     * @Rest\Post("/confirm")
     *
     * @SWG\Parameter(
     *     name="repairOrderPaymentId",
     *     type="integer",
     *     in="formData",
     *     description="Repair Order Payment ID",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     */
    public function confirmPayment(
        Request $request,
        RepairOrderPaymentRepository $repairOrderPaymentRepository,
        PaymentHelper $helper
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $repairOrderPaymentRepository->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order Payment not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        $helper->confirmPayment($rop);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Payment confirmation recorded',
                ]
            )
        );
    }

    /**
     * @Rest\Post("/pay")
     *
     * @SWG\Parameter(
     *     name="repairOrderPaymentId",
     *     type="integer",
     *     in="formData",
     *     required=true
     * )
     * @SWG\Parameter(
     *     name="paymentToken",
     *     description="The token from Collect.js (use: 00000000-000000-000000-000000000000 for testing)",
     *     type="string",
     *     in="formData",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Payment failure",
     *     @SWG\Schema(
     *         @SWG\Property(property="message", type="string")
     *     )
     * )
     * @SWG\Response(response="500", description="Could not contact payment server")
     */
    public function payPayment(
        Request $request,
        PaymentHelper $helper,
        RepairOrderPaymentRepository $repairOrderPaymentRepository
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $repairOrderPaymentRepository->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order Payment not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($rop->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }

        if (null !== $rop->getDatePaid()) {
            return $this->handleView(
                $this->view(
                    [
                        'message' => 'Payment already paid',
                    ],
                    Response::HTTP_BAD_REQUEST
                )
            );
        }

        $message = null;
        $code = Response::HTTP_BAD_REQUEST;
        try {
            $helper->payPayment($rop, $request->request->get('paymentToken'));
            $message = 'Payment successful!';
            $code = Response::HTTP_OK;
        } catch (PaymentException $e) {
            $message = $e->getMessage();
        } catch (Exception $e) {
            $message = 'Could not contact payment server';
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => $message,
                ],
                $code
            )
        );
    }

    /**
     * @Rest\Post("/refund")
     *
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData", required=true)
     * @SWG\Parameter(name="amount", type="string", in="formData", required=true)
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Refund failed",
     *     @SWG\Schema(
     *         @SWG\Property(property="message", type="string")
     *     )
     * )
     * @SWG\Response(response="500", description="Could not contact payment server")
     */
    public function refundPayment(
        Request $request,
        PaymentHelper $helper,
        RepairOrderPaymentRepository $repairOrderPaymentRepository
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $repairOrderPaymentRepository->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order Payment not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        try {
            $amount = MoneyHelper::parseAmount($request->request->get('amount'));
        } catch (InvalidArgumentException $e) {
            return new ValidationResponse(['amount' => $e->getMessage()]);
        }

        $code = Response::HTTP_OK;
        $message = null;
        try {
            $helper->refundPayment($rop, $amount);
            $message = 'Refund successful';
        } catch (InvalidArgumentException | PaymentException $e) {
            $message = $e->getMessage();
            $code = Response::HTTP_BAD_REQUEST;
        } catch (Exception $e) {
            $message = 'Could not contact payment server';
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => $message,
                ],
                $code
            )
        );
    }

    /**
     * @Rest\Post("/send-receipt")
     *
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData", required=true)
     * @SWG\Parameter(name="email", type="string", in="formData", required=true)
     *
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Payment has not been paid")
     * @SWG\Response(response="500", description="Could not send mail")
     */
    public function sendReceipt(
        Request $request,
        PaymentHelper $helper,
        RepairOrderPaymentRepository $repairOrderPaymentRepository
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $repairOrderPaymentRepository->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order Payment not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        // Check if customer role and not customer's RO
        if ($this->isGranted('ROLE_CUSTOMER')) {
            if ($rop->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
            }
        }
        $text = null;
        if (null === $rop->getDatePaid()) {
            $text = 'Cannot send receipt for unpaid order';
        } elseif (!$request->request->has('email')) {
            $text = 'Missing email parameter';
        }
        if (null !== $text) {
            return $this->handleView(
                $this->view(
                    [
                        'message' => $text,
                    ],
                    Response::HTTP_BAD_REQUEST
                )
            );
        }

        $text = 'Receipt sent';
        $code = Response::HTTP_OK;
        try {
            $helper->sendReceipt($rop, $request->request->get('email'));
        } catch (Throwable $e) {
            $text = 'Could not send receipt';
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->handleView(
            $this->view(
                [
                    'message' => $text,
                ],
                $code
            )
        );
    }
}
