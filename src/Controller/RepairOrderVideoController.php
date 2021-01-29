<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\User;
use App\Repository\RepairOrderRepository;
use App\Repository\RepairOrderVideoRepository;
use App\Response\ValidationResponse;
use App\Service\VideoHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use RuntimeException;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Rest\Route("/api/repair-order-video")
 * @SWG\Tag(name="Repair Order Video")
 * @SWG\Response(
 *     response="404",
 *     description="Repair Order or Video does not exist"
 * )
 */
class RepairOrderVideoController extends AbstractFOSRestController
{
    /**
     * @Rest\Post
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     type="integer",
     *     in="formData",
     *     description="Repair Order ID that you're uploading a video for",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderVideo::class, groups=RepairOrderVideo::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     * @SWG\Parameter(name="video", type="file", in="formData", required=true)
     */
    public function uploadVideo(
        Request $request,
        VideoHelper $helper,
        RepairOrderRepository $repairOrderRepository
    ): Response {
        $repairOrderID = $request->get('repairOrderID');
        if (!$repairOrderID) {
            throw new BadRequestHttpException('Missing Required Parameter repairOrderID');
        }

        $repairOrder = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder) {
            throw new NotFoundHttpException('Repair Order Not Found');
        }

        if ($repairOrder->getDeleted()) {
            throw new NotFoundHttpException();
        }

        $file = $request->files->get('video');
        if (!$file instanceof UploadedFile) {
            return new ValidationResponse(['video' => 'File upload failed']);
        } elseif ($file->getError() !== UPLOAD_ERR_OK) {
            return new ValidationResponse(['video' => $file->getErrorMessage()]);
        }

        $user = $this->getUser();
        if (!$user instanceof User || $user->getId() === null) {
            $user = null;
        }

        $video = $helper->uploadVideo($repairOrder, $file, $user);

        $view = $this->view($video);
        $view->getContext()->setGroups(RepairOrderVideo::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{video}")
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrder      $ro
     * @param RepairOrderVideo $video
     * @param VideoHelper      $helper
     *
     * @return Response
     */
    public function deleteVideo(RepairOrder $ro, RepairOrderVideo $video, VideoHelper $helper): Response
    {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $helper->deleteVideo($video);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Video deleted',
                ]
            )
        );
    }

    /**
     * @Rest\Post("/view")
     *
     * @SWG\Parameter(
     *     name="repairOrderVideoID",
     *     type="integer",
     *     in="formData",
     *     description="Repair Order Video ID that is being viewed",
     *     required=true
     * )
     *
     * @SWG\Response(response="200", description="Success!")
     */
    public function viewVideo(
        Request $request,
        VideoHelper $helper,
        RepairOrderVideoRepository $repairOrderVideoRepository
    ): Response {
        $repairOrderVideoID = $request->get('repairOrderVideoID');
        if (!$repairOrderVideoID) {
            throw new BadRequestHttpException('Missing Required Parameter repairOrderVideoID');
        }

        $repairOrderVideo = $repairOrderVideoRepository->find($repairOrderVideoID);
        if (!$repairOrderVideo) {
            throw new NotFoundHttpException('Repair Order Video Not Found');
        }

        $user = $this->getUser();
        if (!$user instanceof Customer && !$user instanceof User) {
            throw new RuntimeException('Could not determine user');
        }

        $helper->viewVideo($repairOrderVideo, $user);

        return $this->handleView(
            $this->view(
                [
                    'message' => 'Video view recorded',
                ]
            )
        );
    }

    /**
     * @Rest\Get("/{video}/interactions")
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *             ref=@Model(type=RepairOrderVideoInteraction::class, groups=RepairOrderVideoInteraction::GROUPS)
     *         )
     *     )
     * )
     *
     * @return Response
     */
    public function getInteractions(RepairOrderVideo $video): Response
    {
        $view = $this->view($video->getInteractions());
        $view->getContext()->setGroups(['rov_list', 'int_list']);

        return $this->handleView($view);
    }
}
