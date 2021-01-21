<?php

namespace App\Controller;

use App\Entity\RepairOrderNote;
use App\Repository\RepairOrderRepository;
use App\Service\RONoteHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Route("/api/repair-order-note")
 * @SWG\Tag(name="Repair Order Notes")
 */
class RepairOrderNoteController extends AbstractFOSRestController
{
    /**
     * @Rest\Post
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     type="integer",
     *     in="formData",
     *     description="ID of the repair order you're adding a note to",
     *     required=true
     * )
     * @SWG\Parameter(
     *     name="note",
     *     type="string",
     *     in="formData",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderNote::class, groups=RepairOrderNote::GROUPS))
     * )
     */
    public function addNote(
        Request $request,
        RepairOrderRepository $repairOrderRepository,
        RONoteHelper $helper
    ): Response {
        $repairOrderID = $request->get('repairOrderID');

        if (!$repairOrderID) {
            return $this->handleView($this->view('Missing Required Parameter: repairOrderID'));
        }

        $repairOrder = $repairOrderRepository->find($repairOrderID);
        $roNote = $helper->addRepairOrderNote($repairOrder, $request->request->all());
        $view = $this->view($roNote);
        $view->getContext()->setGroups(RepairOrderNote::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(
     *     response="204",
     *     description="Success!"
     * )
     */
    public function deleteNote(RepairOrderNote $roNote, RONoteHelper $helper): Response
    {
        $helper->deleteRepairOrderNote($roNote);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Repair Order Note deleted',
                ],
                Response::HTTP_OK
            )
        );
    }
}
