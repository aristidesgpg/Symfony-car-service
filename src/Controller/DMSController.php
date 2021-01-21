<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\User;
use App\Helper\FalsyTrait;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use App\Response\ValidationResponse;
use App\Service\Pagination;
use App\Service\RepairOrderHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DMSController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/dms/suggested-repair-orders")
     *
     * @SWG\Tag(name="DMS")
     * @SWG\Get(description="Get sugested RepairOrder numbers")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return suggested numbers",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(type="integer", description="suggested"),
     *         
     *     )
     * )
     *
     * @param RepairOrderHelper $repairOrderHelper
     * 
     * @return Response
     */
    public function getSuggestedNumbers( RepairOrderHelper $repairOrderHelper  )
    {
        $result  = $repairOrderHelper->getSuggestedRoNumbers();

        $view = $this->view($result);

        return $this->handleView($view);
    }
}
