<?php

namespace App\Controller;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderVideo;
use App\Entity\RepairOrderVideoInteraction;
use App\Service\VideoHelper;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function getAll(RepairOrder $ro): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $videos = $ro->getVideos();
        foreach ($videos as $key => $video) {
            if ($video->isDeleted()) {
                unset($videos[$key]);
            }
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
     * @SWG\Parameter(name="video", type="file", in="formData", required=true)
     *
     * @param Request     $request
     * @param RepairOrder $ro
     * @param VideoHelper $helper
     *
     * @return Response
     */
    public function uploadVideo(Request $request, RepairOrder $ro, VideoHelper $helper): Response {
        if ($ro->getDeleted()) {
            throw new NotFoundHttpException();
        }
        $file = $request->files->get('video');
        if (!$file instanceof UploadedFile) {
            return new JsonResponse(['msg' => 'File not found'], 406);
        }
        $video = $helper->createVideo($ro, $file);
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
    public function getOne(RepairOrder $ro, RepairOrderVideo $video): Response {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $view = $this->view($video);
        $view->getContext()->setGroups(RepairOrderVideo::GROUPS);

        return $this->handleView($view);
    }

    /**
     * @Rest\Delete("/{video}")
     *
     * @param RepairOrder      $ro
     * @param RepairOrderVideo $video
     * @param VideoHelper      $helper
     *
     * @return Response
     */
    public function deleteVideo(RepairOrder $ro, RepairOrderVideo $video, VideoHelper $helper): Response {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $helper->deleteVideo($video);

        return new Response();
    }

    /**
     * @Rest\Get("/{video}/interaction")
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
     * @param RepairOrder      $ro
     * @param RepairOrderVideo $video
     *
     * @return Response
     */
    public function getInteractions(RepairOrder $ro, RepairOrderVideo $video): Response {
        if ($video->getRepairOrder() !== $ro || $ro->getDeleted() || $video->isDeleted()) {
            throw new NotFoundHttpException();
        }
        $view = $this->view($video->getInteractions());
        $view->getContext()->setGroups(RepairOrderVideoInteraction::GROUPS);

        return $this->handleView($view);
    }
}