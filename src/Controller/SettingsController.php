<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use App\Service\SettingsHelper;
use App\Repository\SettingsRepository;
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
     * @Rest\Get("")
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
     *
     * @return Response
     */
    public function getSettings (SettingsRepository $repo): Response {
        return $this->settingsResponse($repo->findAll());
    }

    /**
     * @Rest\Post("/dealer")
     *
     * @SWG\Parameter(name="name", type="string", in="formData")
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="websiteUrl", type="string", in="formData")
     * @SWG\Parameter(name="inventoryUrl", type="string", in="formData")
     * @SWG\Parameter(name="address", type="string", in="formData")
     * @SWG\Parameter(name="address2", type="string", in="formData")
     * @SWG\Parameter(name="city", type="string", in="formData")
     * @SWG\Parameter(name="state", type="string", in="formData")
     * @SWG\Parameter(name="zip", type="string", in="formData")
     * @SWG\Parameter(name="phone", type="string", in="formData")
     * @SWG\Parameter(name="logo", type="file", in="formData")
     * @SWG\Response(response="200", description="Success!")
     *
     * @param Request        $req
     * @param SettingsHelper $helper
     *
     * @return Response
     */
    public function setDealerSettings (Request $req, SettingsHelper $helper): Response {
        $fields   = [
            'name', 'email', 'websiteUrl', 'inventoryUrl', 'address', 'address2', 'city', 'state', 'zip', 'phone'
        ];
        $settings = [];

        foreach ($fields as $key) {
            $settings['dealer_' . $key] = $req->request->get($key);
        }

        $file = $req->files->get('logo');
        if ($file instanceof UploadedFile) {
            $settings['dealer_logo'] = $this->handleImage($file);
        }

        try {
            $helper->commitSettings($settings);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

        return new Response();
    }

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    private function handleImage (UploadedFile $file): string {
        return base64_encode($file->openFile()->fread($file->getSize())); // TODO: Move image and store path
    }

    /**
     * @param Settings[] $settings
     *
     * @return Response
     */
    private function settingsResponse (array $settings): Response {
        $json = [];

        foreach ($settings as $s) {
            if (!$s instanceof Settings) {
                throw new \InvalidArgumentException(sprintf('$settings must be array of "%s" instances', Settings::class));
            }

            $json[] = [
                'key'   => $s->getKey(),
                'value' => ($s->getValue() === null) ? '' : $s->getValue(),
            ];
        }

        return $this->json($json);
    }

    /**
     * @param string $msg
     *
     * @return JsonResponse
     */
    private function errorResponse (string $msg): JsonResponse {
        return $this->json(['error' => $msg], 500);
    }
}
