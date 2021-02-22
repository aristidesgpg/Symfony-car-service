<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderPayment;
use App\Exception\PaymentException;
use App\Helper\FalsyTrait;
use App\Money\MoneyHelper;
use App\Response\ValidationResponse;
use App\Service\PaymentHelper;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Money\Exception\ParserException;
use Money\Money;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
 */
class RepairOrderPaymentController extends AbstractFOSRestController
{
    use FalsyTrait;

    /**
     * @Rest\Get("")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     *     )
     * )
     * @SWG\Parameter(
     *     name="id",
     *     in="query",
     *     type="integer",
     *     description="Repair Order ID"
     * )
     */
    public function getPaymentsForRO(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repairOrderID = $request->get('id');
        // check if params are valid
        if (!$repairOrderID) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $ro = $entityManager->getRepository(RepairOrder::class)->findByUID($repairOrderID);
        if (!$ro) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
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
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     *
     * @SWG\Parameter(
     *     name="id",
     *     in="formData",
     *     required=true,
     *     type="integer",
     *     description="The Repair Order ID"
     * )
     * @SWG\Parameter(name="amount", type="string", in="formData", required=true)
     */
    public function createPayment(Request $request, PaymentHelper $helper, EntityManagerInterface $entityManager): Response
    {
        $repairOrderID = $request->get('id');

        // check if params are valid
        if (!$repairOrderID) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order exists
        $ro = $entityManager->getRepository(RepairOrder::class)->findByUID($repairOrderID);
        if (!$ro) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        try {
            $amount = $this->parseAmount($request->request->get('amount'));
        } catch (\InvalidArgumentException $e) {
            return new ValidationResponse(['amount' => $e->getMessage()]);
        }

        $payment = $helper->addPayment($ro, $amount);
        $view = $this->view($payment);
        $view->getContext()->setGroups(['rop_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{id}")
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

        $view = $this->view($payment);
        $view->getContext()->setGroups(['int_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Paid payments cannot be deleted")
     */
    public function delete(RepairOrderPayment $id, PaymentHelper $helper): Response
    {
        if ($id->getRepairOrder()->getDeleted() || $id->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if (null !== $id->getDatePaid()) {
            return $this->handleView($this->view([
                'message' => 'Paid payments cannot be deleted',
            ], Response::HTTP_BAD_REQUEST));
        }

        $helper->deletePayment($id);

        return $this->handleView($this->view([
            'message' => 'Payment deleted',
        ]));
    }

    /**
     * @Rest\Post("/send")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Payment already sent")
     * @SWG\Response(response="500", description="Unable to send payment")
     *
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData", description="Repair Order Payment ID")
     */
    public function sendPayment(
        Request $request,
        PaymentHelper $helper,
        EntityManagerInterface $entityManager
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $entityManager->getRepository(RepairOrderPayment::class)->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

//        $resend = $this->paramToBool($request->request->get('resend', false));
//        if (true !== $resend && null !== $rop->getDateSent()) {
//            return $this->handleView($this->view([
//                'message' => 'Payment already sent',
//            ], Response::HTTP_BAD_REQUEST));
//        }

        try {
            $helper->sendPayment($rop);
        } catch (TwilioException $e) {
            return $this->handleView($this->view([
                'message' => 'Unable to send payment',
            ], Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        return $this->handleView($this->view([
            'message' => 'Payment sent',
        ]));
    }

    /**
     * @Rest\Post("/view")
     * @SWG\Response(response="200", description="Success!")
     *
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData", description="Repair Order Payment ID")
     */
    public function viewPayment(Request $request, EntityManagerInterface $entityManager, PaymentHelper $helper): Response
    {

        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $entityManager->getRepository(RepairOrderPayment::class)->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        $paid = (null !== $rop->getDatePaid());
        $helper->viewPayment($rop, $paid);

        return $this->handleView($this->view([
            'message' => 'Payment view recorded',
        ]));
    }

    /**
     * @Rest\Post("/confirm")
     * @SWG\Response(response="200", description="Success!")
     *
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData", description="Repair Order Payment ID")
     */
    public function confirmPayment(Request $request, EntityManagerInterface $entityManager, PaymentHelper $helper): Response
    {

        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $entityManager->getRepository(RepairOrderPayment::class)->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        $helper->confirmPayment($rop);

        return $this->handleView($this->view([
            'message' => 'Payment confirmation recorded',
        ]));
    }

    /**
     * @Rest\Post("/pay")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Payment failure",
     *     @SWG\Schema(
     *         @SWG\Property(property="message", type="string")
     *     )
     * )
     * @SWG\Response(response="500", description="Could not contact payment server")
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData")
     * @SWG\Parameter(name="paymentToken", type="string", in="formData", required=true)
     */
    public function payPayment(
        Request $request,
        PaymentHelper $helper,
        EntityManagerInterface $entityManager
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $entityManager->getRepository(RepairOrderPayment::class)->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if (null !== $rop->getDatePaid()) {
            return $this->handleView($this->view([
                'message' => 'Payment already paid',
            ], Response::HTTP_BAD_REQUEST));
        }

        $message = null;
        $code = Response::HTTP_BAD_REQUEST;
        try {
            $helper->payPayment($rop, $request->request->get('paymentToken'));
            $message = 'Payment successful!';
            $code = Response::HTTP_OK;
        } catch (PaymentException $e) {
            $message = $e->getMessage();
        } catch (\Exception $e) {
            $message = 'Could not contact payment server';
        }

        return $this->handleView($this->view([
            'message' => $message,
        ], $code));
    }

    /**
     * @Rest\Post("/refund")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Refund failed",
     *     @SWG\Schema(
     *         @SWG\Property(property="message", type="string")
     *     )
     * )
     * @SWG\Response(response="500", description="Could not contact payment server")
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData")
     * @SWG\Parameter(name="amount", type="string", in="formData", required=true)
     */
    public function refundPayment(
        Request $request,
        PaymentHelper $helper,
        EntityManagerInterface $entityManager
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $entityManager->getRepository(RepairOrderPayment::class)->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        try {
            $amount = $this->parseAmount($request->request->get('amount'));
        } catch (\InvalidArgumentException $e) {
            return new ValidationResponse(['amount' => $e->getMessage()]);
        }

        $code = Response::HTTP_OK;
        $message = null;
        try {
            $helper->refundPayment($rop, $amount);
            $message = 'Refund successful';
        } catch (\InvalidArgumentException | PaymentException $e) {
            $message = $e->getMessage();
            $code = Response::HTTP_BAD_REQUEST;
        } catch (\Exception $e) {
            $message = 'Could not contact payment server';
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->handleView($this->view([
            'message' => $message,
        ], $code));
    }

    /**
     * @Rest\Post("/send-receipt")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Payment has not been paid")
     * @SWG\Response(response="500", description="Could not send mail")
     *
     * @SWG\Parameter(name="repairOrderPaymentId", type="integer", in="formData")
     * @SWG\Parameter(name="sendTo", type="string", in="formData", required=true)
     */
    public function sendReceipt(
        Request $request,
        PaymentHelper $helper,
        EntityManagerInterface $entityManager
    ): Response {
        $repairOrderPaymentId = $request->get('repairOrderPaymentId');

        // check if params are valid
        if (!$repairOrderPaymentId) {
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }

        // Check if Repair Order Payment exists
        $rop = $entityManager->getRepository(RepairOrderPayment::class)->find($repairOrderPaymentId);
        if (!$rop) {
            throw new NotFoundHttpException('Repair Order not found');
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        if ($rop->getRepairOrder()->getDeleted() || $rop->isDeleted()) {
            throw new NotFoundHttpException();
        }

        $text = null;
        if (null === $rop->getDatePaid()) {
            $text = 'Cannot send receipt for unpaid order';
        } elseif (!$request->request->has('sendTo')) {
            $text = 'Missing sendTo parameter';
        }
        if (null !== $text) {
            return $this->handleView($this->view([
                'message' => $text,
            ], Response::HTTP_BAD_REQUEST));
        }

        $text = 'Receipt sent';
        $code = Response::HTTP_OK;
        try {
            $helper->sendReceipt($rop, $request->request->get('sendTo'));
        } catch (\Throwable $e) {
            $text = 'Could not send receipt';
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->handleView($this->view([
            'message' => $text,
        ], $code));
    }

    private function isValid(RepairOrderPayment $rop): bool
    {
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function parseAmount(?string $amount): Money
    {
        try {
            $money = MoneyHelper::parse($amount);
        } catch (ParserException $e) {
            throw new \InvalidArgumentException('Invalid format', 0, $e);
        }
        if ($money->isNegative() || $money->isZero()) {
            throw new \InvalidArgumentException('Must be greater than zero');
        }

        return $money;
    }
}
