<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderPayment;
use App\Exception\PaymentException;
use App\Helper\FalsyTrait;
use App\Money\MoneyHelper;
use App\Response\ValidationResponse;
use App\Service\PaymentHelper;
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
 * Class RepairOrderPaymentController
 * @package App\Controller
 *
 * @Rest\Route("/api/repair-order/{ro}/payment")
 * @SWG\Tag(name="Repair Order Payment")
 * @SWG\Response(
 *     response="404",
 *     description="Repair Order or Payment does not exist"
 * )
 */
class RepairOrderPaymentController extends AbstractFOSRestController {
    use FalsyTrait;

    /**
     * @Rest\Get
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     *     )
     * )
     *
     * @param RepairOrder $ro
     *
     * @return Response
     */
    public function getAll (RepairOrder $ro): Response {
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
        $view->getContext()->setGroups(RepairOrderPayment::GROUPS);

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
     * @SWG\Parameter(name="amount", type="string", in="formData", required=true)
     *
     * @param RepairOrder   $ro
     * @param Request       $request
     * @param PaymentHelper $helper
     *
     * @return Response
     */
    public function createPayment (RepairOrder $ro, Request $request, PaymentHelper $helper): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }

        try {
            $amount = $this->parseAmount($request->request->get('amount'));
        } catch (\InvalidArgumentException $e) {
            return new ValidationResponse(['amount' => $e->getMessage()]);
        }

        $payment = $helper->addPayment($ro, $amount);
        $view = $this->view($payment);
        $view->getContext()->setGroups(RepairOrderPayment::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{payment}")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderPayment::class, groups=RepairOrderPayment::GROUPS))
     * )
     *
     * @param RepairOrder        $ro
     * @param RepairOrderPayment $payment
     *
     * @return Response
     */
    public function getOne (RepairOrder $ro, RepairOrderPayment $payment): Response {
        if ($ro->getDeleted() || $payment->isDeleted() || $ro !== $payment->getRepairOrder()) {
            throw new NotFoundHttpException();
        }

        $view = $this->view($payment);
        $view->getContext()->setGroups(RepairOrderPayment::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{payment}")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Paid payments cannot be deleted")
     *
     * @param RepairOrder        $ro
     * @param RepairOrderPayment $payment
     * @param PaymentHelper      $helper
     *
     * @return Response
     */
    public function delete (RepairOrder $ro, RepairOrderPayment $payment, PaymentHelper $helper): Response {
        if ($ro->getDeleted() || $payment->isDeleted() || $ro !== $payment->getRepairOrder()) {
            throw new NotFoundHttpException();
        }

        if ($payment->getDatePaid() !== null) {
            return $this->handleView($this->view([
                'message' => 'Paid payments cannot be deleted',
            ], Response::HTTP_BAD_REQUEST));
        }

        $helper->deletePayment($payment);

        return $this->handleView($this->view([
            'message' => 'Payment deleted',
        ]));
    }

    /**
     * @Rest\Post("/{payment}/send")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(response="400", description="Payment already sent")
     * @SWG\Response(response="500", description="Unable to send payment")
     *
     * @SWG\Parameter(name="resend", type="boolean", in="formData", description="Resend payment")
     *
     * @param RepairOrder        $ro
     * @param RepairOrderPayment $payment
     * @param Request            $request
     * @param PaymentHelper      $helper
     *
     * @return Response
     */
    public function sendPayment (RepairOrder $ro, RepairOrderPayment $payment, Request $request,
                                 PaymentHelper $helper): Response {
        if ($ro->getDeleted() || $payment->isDeleted() || $ro !== $payment->getRepairOrder()) {
            throw new NotFoundHttpException();
        }

        $resend = $this->paramToBool($request->request->get('resend', false));
        if ($resend !== true && $payment->getDateSent() !== null) {
            return $this->handleView($this->view([
                'message' => 'Payment already sent',
            ], Response::HTTP_BAD_REQUEST));
        }

        try {
            $helper->sendPayment($payment);
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
     * @Rest\Post("/{payment}/view")
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrder        $ro
     * @param RepairOrderPayment $payment
     * @param PaymentHelper      $helper
     *
     * @return Response
     */
    public function viewPayment (RepairOrder $ro, RepairOrderPayment $payment, PaymentHelper $helper): Response {
        if ($ro->getDeleted() || $payment->isDeleted() || $ro !== $payment->getRepairOrder()) {
            throw new NotFoundHttpException();
        }

        $paid = ($payment->getDatePaid() !== null);
        $helper->viewPayment($payment, $paid);

        return $this->handleView($this->view([
            'message' => 'Payment view recorded',
        ]));
    }

    /**
     * @Rest\Post("/{payment}/pay")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Payment failure",
     *     @SWG\Schema(
     *         @SWG\Property(property="message", type="string")
     *     )
     * )
     * @SWG\Response(response="500", description="Could not contact payment server")
     *
     * @SWG\Parameter(name="paymentToken", type="string", in="formData", required=true)
     *
     * @param RepairOrder        $ro
     * @param RepairOrderPayment $payment
     * @param Request            $request
     * @param PaymentHelper      $helper
     *
     * @return Response
     */
    public function payPayment (RepairOrder $ro, RepairOrderPayment $payment, Request $request,
                                PaymentHelper $helper): Response {
        if ($ro->getDeleted() || $payment->isDeleted() || $ro !== $payment->getRepairOrder()) {
            throw new NotFoundHttpException();
        }
        if ($payment->getDatePaid() !== null) {
            return $this->handleView($this->view([
                'message' => 'Payment already paid',
            ], Response::HTTP_BAD_REQUEST));
        }

        $message = null;
        $code    = Response::HTTP_BAD_REQUEST;
        try {
            $helper->payPayment($payment, $request->request->get('paymentToken'));
            $message = 'Payment successful!';
            $code    = Response::HTTP_OK;
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
     * @Rest\Post("/{payment}/refund")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Response(
     *     response="400",
     *     description="Refund failed",
     *     @SWG\Schema(
     *         @SWG\Property(property="message", type="string")
     *     )
     * )
     * @SWG\Response(response="500", description="Could not contact payment server")
     *
     * @SWG\Parameter(name="amount", type="string", in="formData", required=true)
     *
     * @param RepairOrder        $ro
     * @param RepairOrderPayment $payment
     * @param Request            $request
     * @param PaymentHelper      $helper
     *
     * @return Response
     */
    public function refundPayment (RepairOrder $ro, RepairOrderPayment $payment, Request $request,
                                   PaymentHelper $helper): Response {
        if ($ro->getDeleted() || $payment->isDeleted() || $ro !== $payment->getRepairOrder()) {
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
            $helper->refundPayment($payment, $amount);
            $message = 'Refund successful';
        } catch (\InvalidArgumentException|PaymentException $e) {
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
     * @param string|null $amount
     *
     * @return Money
     * @throws \InvalidArgumentException
     */
    private function parseAmount (?string $amount): Money {
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