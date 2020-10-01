<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use App\Repository\SettingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SettingsController
 *
 * @package App\Controller
 * @Rest\Route("/api/settings")
 * @SWG\Tag(name="Settings")
 * @SWG\Response(
 *     response="500",
 *     description="Error",
 *     @SWG\Schema(
 *         type="object",
 *         @SWG\Property(property="error", type="string")
 *     )
 * )
 */
class SettingsController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/get")
     * @SWG\Response(
     *     response="200",
     *     description="Success!",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Settings::class))
     *     )
     * )
     *
     * @param SettingsRepository $repo
     * @return Response
     */
    public function getSettings(SettingsRepository $repo): Response {
        return $this->handleView($this->view($repo->findAll()));
    }

    /**
     * @Rest\Post("/set")
     * @SWG\Parameter(
     *     name="settings",
     *     in="body",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(type="object", ref=@Model(type=Settings::class))
     *     )
     * )
     * @SWG\Response(response="200", description="Success!")
     *
     * @param Request $req
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function setSettings(Request $req, EntityManagerInterface $em): Response {
        $json = json_decode($req->getContent(), true);
        try {
            $this->commitSettings($json, $em);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

        return new Response();
    }

    /**
     * @Rest\Post("/upload")
     * @SWG\Response(response="200", description="Success!")
     * @SWG\Parameter(
     *     name="key",
     *     type="string",
     *     in="formData",
     *     description="customer_video OR dealer_logo"
     * )
     * @SWG\Parameter(name="file", type="file", in="formData")
     *
     * @param Request $req
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function upload(Request $req, EntityManagerInterface $em): Response {
        $file = $req->files->get('file');
        if (!$file instanceof UploadedFile) {
            return $this->errorResponse('No file found');
        }
        $key = $req->request->get('key');
        $setting = ['key' => $key, 'value' => null];
        switch ($key) {
            case 'customer_video':
                return $this->errorResponse('Not implemented'); // TODO
            case 'dealer_logo':
                $setting['value'] = $this->handleImage($file);
                break;
            default:
                return $this->errorResponse(sprintf('Unknown key: "%s"', $key));
        }
        try {
            $this->commitSettings([$setting], $em);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

        return new Response();
    }

    private function handleImage(UploadedFile $file): string
    {
        return base64_encode($file->openFile()->fread($file->getSize())); // TODO: Move image and store path
    }

    /**
     * @param array $settings
     * @param EntityManagerInterface $em
     * @throws
     */
    private function commitSettings(array $settings, EntityManagerInterface $em): void {
        foreach ($settings as $s) {
            ['key' => $key, 'value' => $value] = $s;
            if (empty($key) || !is_string($key)) {
                throw new \InvalidArgumentException('"key" cannot be empty');
            }
            $obj = $em->find(Settings::class, $key);
            if (!$obj instanceof Settings) {
                $obj = new Settings($key, $value);
                $em->persist($obj);
            } else {
                $obj->setValue($value);
            }
        }
        $em->beginTransaction();
        try {
            $em->flush();
            $em->commit();
        } catch (\Exception $e) {
            $this->logger->error(sprintf('Caught exception during flush: "%s"', $e->getMessage()));
            $em->rollback();
            throw new \RuntimeException('An error occurred'); // TODO: More helpful message
        }
    }

    /**
     * @param string $msg
     * @return JsonResponse
     */
    private function errorResponse(string $msg): JsonResponse {
        return $this->json(['error' => $msg], 500);
    }
}