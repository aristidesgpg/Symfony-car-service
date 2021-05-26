<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\RepairOrderVideo;
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
     * @Rest\Get
     *
     * @SWG\Parameter(
     *     name="repairOrderID",
     *     type="integer",
     *     description="The Repair Order ID you want to find videos for",
     *     in="query",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderVideo::class, groups=RepairOrderVideo::GROUPS))
     *     )
     * )
     */
    public function getAll(Request $request, RepairOrderRepository $repairOrderRepository): Response
    {
        $repairOrderID = $request->query->get('repairOrderID');
        if (!$repairOrderID) {
            throw new BadRequestHttpException('Missing Required Parameter repairOrderID');
        }

        $repairOrder = $repairOrderRepository->find($repairOrderID);
        if (!$repairOrder || $repairOrder->getDeleted()) {
            throw new NotFoundHttpException('Repair Order Not Found');
        }

//        // Check if customer role and not customer's RO
//        if ($this->isGranted('ROLE_CUSTOMER')) {
//            if ($repairOrder->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
//                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
//            }
//        }

        $videos = [];
        foreach ($repairOrder->getVideos() as $video) {
            if ($video->isDeleted()) {
                continue;
            }
            $videos[] = $video;
        }

        $view = $this->view($videos);
        $view->getContext()->setGroups(['rov_list', 'int_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{id}")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderVideo::class, groups=RepairOrderVideo::GROUPS))
     * )
     */
    public function getOne(RepairOrderVideo $repairOrderVideo)
    {
        $view = $this->view($repairOrderVideo);
        $view->getContext()->setGroups(['rov_list', 'int_list']);

        return $this->handleView($view);
    }

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
        } elseif (UPLOAD_ERR_OK !== $file->getError()) {
            return new ValidationResponse(['video' => $file->getErrorMessage()]);
        }

        $user = $this->getUser();
        if (!$user instanceof User || null === $user->getId()) {
            $user = null;
        }

        $video = $helper->uploadVideo($repairOrder, $file, $user);

        $view = $this->view($video);
        $view->getContext()->setGroups(['rov_list', 'int_list']);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{id}")
     * @SWG\Response(response="200", description="Success!")
     */
    public function deleteVideo(RepairOrderVideo $video, VideoHelper $helper): Response
    {
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

//        // Check if customer role and not customer's RO
//        if ($this->isGranted('ROLE_CUSTOMER')) {
//            if ($repairOrderVideo->getRepairOrder()->getPrimaryCustomer()->getId() != $this->getUser()->getId()) {
//                return $this->handleView($this->view('Not Authorized', Response::HTTP_UNAUTHORIZED));
//            }
//        }

        $user = $this->getUser();
        if (!$user instanceof Customer && !$user instanceof User) {
            throw new RuntimeException('Could not determine user');
        }

        $helper->viewVideo($repairOrderVideo, $user);

        $view = $this->view($repairOrderVideo);
        $view->getContext()->setGroups(['rov_list', 'int_list']);

        return $this->handleView($view);
    }
}
