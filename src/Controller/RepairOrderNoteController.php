<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderNote;
use App\Helper\FalsyTrait;
use App\Repository\RepairOrderRepository;
use App\Response\ValidationResponse;
use App\Service\Pagination;
use App\Service\RepairOrderHelper;
use App\Service\RONoteHelper;
use DateTime;
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

/**
 * Class RepairOrderNoteController
 *
 * @package App\Controller
 *
 * @Rest\Route("/api/repair-order")
 * @SWG\Tag(name="Repair Order Notes")
 */

class RepairOrderNoteController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/{id}/note")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderNote::class, groups=RepairOrderNote::GROUPS))
     * )
     *
     * @SWG\Parameter(name="note", type="string", in="formData", required=true)
     *
     * @param Request      $req
     * @param int          $id
     * @param RONoteHelper $helper
     *
     * @return Response
     */
    public function addNote (Request $req, $id, RepairOrderRepository $roRepo, RONoteHelper $helper): Response {

        $ro = $roRepo->findOneBy(['id' => $id]);
        
        $roNote = $helper->addRepairOrderNote($ro, $req->request->all());
        $view = $this->view($roNote);
        $view->getContext()->setGroups(RepairOrderNote::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/note/{id}")
     * @SWG\Response(
     *     response="204",
     *     description="Success!"
     * )
     *
     * @param RepairOrderNote          $roNote
     * @param RONoteHelper $helper
     *
     * @return Response
     */
    public function deleteNote(RepairOrderNote $roNote, RONoteHelper $helper) {
        $helper->deleteRepairOrderNote($roNote);
        return $this->handleView($this->view([
            'message' => 'Repair Order Note deleted',
        ], Response::HTTP_OK));
    }
}
