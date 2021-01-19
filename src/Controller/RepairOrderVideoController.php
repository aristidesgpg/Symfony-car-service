<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Entity\User;
use App\Response\ValidationResponse;
use App\Service\VideoHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class RepairOrderVideoController
 * @package App\Controller
 *
 * @Rest\Route("/api/repair-order/{ro}/video")
 * @SWG\Tag(name="Repair Order Video")
 * @SWG\Response(
 *     response="404",
 *     description="Repair Order or Video does not exist"
 * )
 */
class RepairOrderVideoController extends AbstractFOSRestController {
    /**
     * @Rest\Get
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=RepairOrderVideo::class, groups=RepairOrderVideo::GROUPS))
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
        $videos = [];
        foreach ($ro->getVideos() as $video) {
            if ($video->isDeleted()) {
                continue;
            }
            $videos[] = $video;
        }
        $view = $this->view($videos);
        $view->getContext()->setGroups(RepairOrderVideo::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Post
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(ref=@Model(type=RepairOrderVideo::class, groups=RepairOrderVideo::GROUPS))
     * )
     * @SWG\Response(response="406", ref="#/responses/ValidationResponse")
     * @SWG\Parameter(name="video", type="file", in="formData", required=true)
     *
     * @param Request     $request
     * @param RepairOrder $ro
     * @param VideoHelper $helper
     *
     * @return Response
     */
    public function uploadVideo (Request $request, RepairOrder $ro, VideoHelper $helper): Response {
        if ($ro->getDeleted()) {
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
        $video = $helper->uploadVideo($ro, $file, $user);

        $view = $this->view($video);
        $view->getContext()->setGroups(RepairOrderVideo::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/{video}")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(type="object", ref=@Model(type=RepairOrderVideo::class, groups=RepairOrderVideo::GROUPS))
     * )
     *
     * @param RepairOrder      $ro
     * @param RepairOrderVideo $video
     *
     * @return Response
     */
    public function getOne (RepairOrder $ro, RepairOrderVideo $video): Response {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
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
    public function deleteVideo (RepairOrder $ro, RepairOrderVideo $video, VideoHelper $helper): Response {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $helper->deleteVideo($video);

        return $this->handleView($this->view([
            'message' => 'Video deleted',
        ]));
    }

    /**
     * @Rest\Post("/{video}/view")
     * @SWG\Response(response="200", description="Success!")
     *
     * @param RepairOrder      $ro
     * @param RepairOrderVideo $video
     * @param VideoHelper      $helper
     *
     * @return Response
     */
    public function viewVideo (RepairOrder $ro, RepairOrderVideo $video, VideoHelper $helper): Response {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $user = $this->getUser();
        if (!$user instanceof Customer && !$user instanceof User) {
            throw new \RuntimeException('Could not determine user');
        }
        $helper->viewVideo($ro, $video, $user);

        return $this->handleView($this->view([
            'message' => 'Video view recorded',
        ]));
    }
}