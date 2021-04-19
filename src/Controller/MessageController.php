<?php

namespace App\Controller;

use App\Service\InternalMessageHelper;
use App\Service\ServiceSMSHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MessageController.
 */
class MessageController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/message/unread")
     *
     * @SWG\Tag(name="Message")
     * @SWG\Get(description="Get total unread messages")
     * @SWG\Response(
     *      response=200,
     *      description="Return total of unread messages",
     *      @SWG\Items(
     *          type="object",
     *          @SWG\Property(property="internal", type="integer", description="Total # of unread internal messages"),
     *          @SWG\Property(property="service", type="integer", description="Total # of unread service messages"),
     *          @SWG\Property(property="sales", type="integer", description="Total # of unread sales messages")
     *      )
     * )
     *
     * @return Response
     */
    public function unread(InternalMessageHelper $internalMessageHelper, ServiceSMSHelper $serviceSMSHelper)
    {
        $totalUnreads = [
            'internal' => $internalMessageHelper->getUnReadMessagesCount(),
            'service' => $serviceSMSHelper->getUnReadMessagesCount(),
            'sales' => 0,
        ];

        return $this->handleView($this->view($totalUnreads));
    }
}
