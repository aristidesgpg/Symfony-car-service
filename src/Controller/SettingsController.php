<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use App\Service\PasswordHelper;
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
 *     description="Server Error",
 *     @SWG\Schema(
 *         type="object",
 *         @SWG\Property(property="error", type="string")
 *     )
 * )
 */
class SettingsController extends AbstractFOSRestController {
    public const SMS_MAX_LENGTH = 160;
    public const SMS_EXTRA_MAX_LENGTH = 109;
    public const ZIP_LENGTH = 5;
    public const ZIP_P4_LENGTH = 10;
    public const PHONE_LENGTH = 10;
    private const TOO_LONG_MSG = 'Value cannot exceed %d characters';

    use iServiceLoggerTrait;

    /**
     * @Rest\Get
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
     * @Rest\Post
     * @SWG\Response(
     *     response="200",
     *     description="Success!"
     * )
     * @SWG\Response(
     *     response="400",
     *     description="Validation failure",
     *     @SWG\Schema(
     *         type="array",
     *         items=@SWG\Schema(
     *             type="object",
     *             @SWG\Property(property="key", type="string", description="Parameter name"),
     *             @SWG\Property(property="msg", type="string", description="Validation message")
     *         )
     *     )
     * )
     *
     * @SWG\Parameter(name="phase1", type="integer", in="formData")
     * @SWG\Parameter(name="phase2", type="integer", in="formData")
     * @SWG\Parameter(name="phase3", type="integer", in="formData")
     *
     * @SWG\Parameter(name="techUsername", type="string", in="formData")
     * @SWG\Parameter(name="techPassword", type="string", format="password", in="formData")
     *
     * @SWG\Parameter(name="custAppraise", type="string", in="formData")
     * @SWG\Parameter(name="custVideo", type="file", in="formData")
     * @SWG\Parameter(name="custFinanceUrl", type="string", in="formData")
     *
     * @SWG\Parameter(name="laborRate", type="number", in="formData")
     * @SWG\Parameter(name="useMatrix", type="boolean", in="formData")
     * @SWG\Parameter(name="laborTax", type="number", in="formData")
     * @SWG\Parameter(name="partsTax", type="number", in="formData")
     *
     * @SWG\Parameter(name="estimateWaiverText", type="string", in="formData")
     * @SWG\Parameter(name="activateAuthMsg", type="boolean", in="formData")
     * @SWG\Parameter(name="waiverText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     *
     * @SWG\Parameter(name="usageEmails", type="string", in="formData")
     * @SWG\Parameter(name="openLate", type="boolean", in="formData")
     *
     * @SWG\Parameter(name="salesVideoText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     *
     * @SWG\Parameter(name="name", type="string", in="formData")
     * @SWG\Parameter(name="email", type="string", in="formData")
     * @SWG\Parameter(name="websiteUrl", type="string", in="formData")
     * @SWG\Parameter(name="inventoryUrl", type="string", in="formData")
     * @SWG\Parameter(name="address", type="string", in="formData")
     * @SWG\Parameter(name="address2", type="string", in="formData")
     * @SWG\Parameter(name="city", type="string", in="formData")
     * @SWG\Parameter(name="state", type="string", in="formData")
     * @SWG\Parameter(name="zip", type="string", in="formData", minLength=SettingsController::ZIP_LENGTH, maxLength=SettingsController::ZIP_P4_LENGTH)
     * @SWG\Parameter(name="phone", type="string", in="formData", maxLength=SettingsController::PHONE_LENGTH)
     * @SWG\Parameter(name="logo", type="file", in="formData")
     *
     * @SWG\Parameter(name="spotLightUrl", type="string", in="formData")
     *
     * @SWG\Parameter(name="googleUrl", type="string", in="formData")
     * @SWG\Parameter(name="facebookUrl", type="string", in="formData")
     * @SWG\Parameter(name="reviewLogo", type="file", in="formData")
     * @SWG\Parameter(name="reviewSms", type="string", in="formData", maxLength=SettingsController::SMS_MAX_LENGTH)
     *
     * @param Request $req
     * @param SettingsHelper $helper
     *
     * @return Response
     */
    public function setSettings (Request $req, SettingsHelper $helper): Response {
        $param_list = [ // FIXME: Pull parameters from docblock
            'phase1', 'phase2', 'phase3', 'techUsername', 'techPassword', 'custAppraise', 'custFinanceUrl',
            'laborRate', 'useMatrix', 'laborTax', 'partsTax', 'estimateWaiverText', 'activateAuthMsg', 'waiverText',
            'usageEmails', 'openLate', 'salesVideoText', 'name', 'email', 'websiteUrl', 'inventoryUrl', 'address',
            'address2', 'city', 'state', 'zip', 'phone', 'spotLightUrl', 'googleUrl', 'facebookUrl', 'reviewSms',
        ];
        $file_list = ['custVideo', 'logo', 'reviewLogo'];

        $settings = [];
        $errors = [];
        foreach ($param_list as $key) {
            if ($req->request->has($key) !== true) {
                continue;
            }
            $val = $req->request->get($key);
            switch ($key) {
                case 'techPassword':
                    try {
                        $val = PasswordHelper::hashPassword($val);
                    } catch (\Exception $e) {
                        $errors[$key] = $e->getMessage();
                    }
                    break;
                case 'reviewSms':
                    if (strlen($val) > self::SMS_MAX_LENGTH) {
                        $errors[$key] = sprintf(self::TOO_LONG_MSG, self::SMS_MAX_LENGTH);
                    }
                    break;
                case 'waiverText':
                case 'salesVideoText':
                    if (strlen($val) > self::SMS_EXTRA_MAX_LENGTH) {
                        $errors[$key] = sprintf(self::TOO_LONG_MSG, self::SMS_EXTRA_MAX_LENGTH);
                    }
                    break;
                case 'zip':
                    if (!in_array(strlen($val), [self::ZIP_LENGTH, self::ZIP_P4_LENGTH])) {
                        $errors[$key] = sprintf(
                            'ZIP must be either %d characters or %d in the case of ZIP+4',
                            self::ZIP_LENGTH,
                            self::ZIP_P4_LENGTH
                        );
                    }
                    break;
                case 'phone':
                    if (strlen($val) !== self::PHONE_LENGTH) {
                        $errors[$key] = sprintf('Phone number must be %d digits', self::PHONE_LENGTH);
                    }
                    break;
                default:
            }
            $settings[$key] = $val;
        }
        $files = [];
        foreach ($file_list as $key) {
            if ($req->files->has($key) !== true) {
                continue;
            }
            $file = $req->files->get($key);
            if (!$file instanceof UploadedFile) {
                $errors[$key] = 'Could not find file';
                continue;
            }
            if ($key === 'custVideo') {
                // TODO: Validate video
            } else {
                // TODO: Validate image
            }
            $files[] = [$key, $file]; // Defer file processing in case of validation errors
        }
        if (!empty($errors)) {
            return $this->validationErrorResponse($errors);
        }
        foreach ($files as $f) {
            [$key, $file] = $f;
            $settings[$key] = ($key === 'custVideo') ? $this->handleVideo($file) : $this->handleImage($file);
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

    private function handleVideo (UploadedFile $file): string {
        return 'not implemented'; // TODO
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

    private function validationErrorResponse(array $errors): JsonResponse {
        $json = [];
        foreach ($errors as $k=>$v) {
            $json[] = ['key' => $k, 'msg' => $v];
        }

        return $this->json($json, 400);
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
