<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use App\Service\PasswordHelper;
use App\Service\SettingsHelper;
use App\Repository\SettingsRepository;
use App\Service\UploadHelper;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use InvalidArgumentException;
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
    public const  SMS_MAX_LENGTH       = 160;
    public const  SMS_EXTRA_MAX_LENGTH = 109;
    public const  ZIP_LENGTH           = 5;
    public const  ZIP_P4_LENGTH        = 10;
    public const  PHONE_LENGTH         = 10;
    private const TOO_LONG_MSG         = 'Value cannot exceed %d characters';

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
     * Phase Settings
     * @SWG\Parameter(name="phase1", type="integer", in="formData")
     * @SWG\Parameter(name="phase2", type="integer", in="formData")
     * @SWG\Parameter(name="phase3", type="integer", in="formData")
     *
     * Tech App Settings
     * @SWG\Parameter(name="techAppUsername", type="string", in="formData")
     * @SWG\Parameter(name="techAppPassword", type="string", format="password", in="formData")
     *
     * Customer Web App Settings
     * @SWG\Parameter(name="custAppAppraiseButtonText", type="string", in="formData")
     * @SWG\Parameter(name="custAppPostInspectionVideo", type="file", in="formData")
     * @SWG\Parameter(name="custAppFinanceRepairUrl", type="string", in="formData")
     *
     * Service Text Settings
     * @SWG\Parameter(name="serviceTextIntro", type="string", in="formData", maxLength=SettingsController::SMS_MAX_LENGTH)
     * @SWG\Parameter(name="serviceTextVideo", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     * @SWG\Parameter(name="serviceTextVideoResend", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     * @SWG\Parameter(name="serviceTextQuote", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     * @SWG\Parameter(name="serviceTextPayment", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     *
     * Pricing Settings
     * @SWG\Parameter(name="pricingLaborRate", type="number", in="formData")
     * @SWG\Parameter(name="pricingUseMatrix", type="boolean", in="formData")
     * @SWG\Parameter(name="pricingLaborTax", type="number", in="formData")
     * @SWG\Parameter(name="pricingPartsTax", type="number", in="formData")
     *
     * Waiver Settings
     * @SWG\Parameter(name="waiverEstimateText", type="string", in="formData")
     * @SWG\Parameter(name="waiverActivateAuthMessage", type="boolean", in="formData")
     * @SWG\Parameter(name="waiverIntroText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     *
     * // Other Settings
     * @SWG\Parameter(name="advisorUsageEmails", type="string", in="formData")
     * @SWG\Parameter(name="openLate", type="boolean", in="formData")
     *
     * Preview Settings
     * @SWG\Parameter(name="previewSalesVideoText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     *
     * Upgrade Settings
     * @SWG\Parameter(name="upgradeTradeInTax", type="number", in="formData")
     * @SWG\Parameter(name="upgradeTradeInTaxLimit", type="number", in="formData")
     * @SWG\Parameter(name="upgradeOfferExpiration", type="number", in="formData")
     * @SWG\Parameter(name="upgradeInstantOfferUrl", type="string", in="formData")
     * @SWG\Parameter(name="upgradeIntroText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     * @SWG\Parameter(name="upgradeOfferText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     * @SWG\Parameter(name="upgradeCashOfferCopy", type="string", in="formData")
     * @SWG\Parameter(name="upgradeDisclaimer", type="string", in="formData")
     *
     * General Settings
     * @SWG\Parameter(name="generalName", type="string", in="formData")
     * @SWG\Parameter(name="generalEmail", type="string", in="formData")
     * @SWG\Parameter(name="generalWebsiteUrl", type="string", in="formData")
     * @SWG\Parameter(name="generalInventoryUrl", type="string", in="formData")
     * @SWG\Parameter(name="generaAddress", type="string", in="formData")
     * @SWG\Parameter(name="generalAddress2", type="string", in="formData")
     * @SWG\Parameter(name="generalCity", type="string", in="formData")
     * @SWG\Parameter(name="generalState", type="string", in="formData")
     * @SWG\Parameter(name="generalZip", type="string", in="formData", minLength=SettingsController::ZIP_LENGTH, maxLength=SettingsController::ZIP_P4_LENGTH)
     * @SWG\Parameter(name="generalPhone", type="string", in="formData", maxLength=SettingsController::PHONE_LENGTH)
     * @SWG\Parameter(name="generalLogo", type="file", in="formData")
     *
     * myReview Settings
     * @SWG\Parameter(name="reviewGoogleUrl", type="string", in="formData")
     * @SWG\Parameter(name="reviewFacebookUrl", type="string", in="formData")
     * @SWG\Parameter(name="reviewLogo", type="file", in="formData")
     * @SWG\Parameter(name="reviewText", type="string", in="formData", maxLength=SettingsController::SMS_MAX_LENGTH)
     *
     * @param Request        $req
     * @param SettingsHelper $helper
     * @param UploadHelper   $uploader
     *
     * @return Response
     */
    public function setSettings (Request $req, SettingsHelper $helper, UploadHelper $uploader): Response {
        $parameterList = SettingsHelper::VALID_SETTINGS;
        $fileList      = SettingsHelper::VALID_FILE_SETTINGS;
        $settings      = [];
        $errors        = [];

        // Loop each one to see if it exists and validate it
        foreach ($parameterList as $key) {
            // Doesn't exist, move along
            if ($req->request->has($key) !== true) {
                continue;
            }

            // Get value, see what to do w/ it
            $val = $req->request->get($key);
            switch ($key) {
                case 'techAppPassword':
                    try {
                        $val = PasswordHelper::hashPassword($val);
                    } catch (Exception $e) {
                        $errors[$key] = $e->getMessage();
                    }
                    break;
                case 'serviceTextIntro':
                case 'reviewText':
                    if (strlen($val) > self::SMS_MAX_LENGTH) {
                        $errors[$key] = sprintf(self::TOO_LONG_MSG, self::SMS_MAX_LENGTH);
                    }
                    break;
                case 'serviceTextVideo':
                case 'serviceTextVideoResend':
                case 'serviceTextQuote':
                case 'serviceTextPayment':
                case 'waiverIntroText':
                case 'previewSalesVideoText':
                case 'upgradeIntroText':
                case 'upgradeOfferText':
                    if (strlen($val) > self::SMS_EXTRA_MAX_LENGTH) {
                        $errors[$key] = sprintf(self::TOO_LONG_MSG, self::SMS_EXTRA_MAX_LENGTH);
                    }
                    break;
                case 'generalZip':
                    if (!in_array(strlen($val), [self::ZIP_LENGTH, self::ZIP_P4_LENGTH])) {
                        $errors[$key] = sprintf(
                            'ZIP must be either %d characters or %d in the case of ZIP+4',
                            self::ZIP_LENGTH,
                            self::ZIP_P4_LENGTH
                        );
                    }
                    break;
                case 'generalPhone':
                    if (strlen($val) !== self::PHONE_LENGTH) {
                        $errors[$key] = sprintf('Phone number must be %d digits', self::PHONE_LENGTH);
                    }
                    break;
                default:
            }
            $settings[$key] = $val;
        }


        $files = [];
        foreach ($fileList as $key) {
            if ($req->files->has($key) !== true) {
                continue;
            }

            $file = $req->files->get($key);
            if (!$file instanceof UploadedFile) {
                $errors[$key] = 'Could not find file';
                continue;
            }

            $isValid = ($key === 'custAppPostInspectionVideo') ? $uploader->isValidVideo($file) : $uploader->isValidImage($file);
            if ($isValid !== true) {
                $errors[$key] = 'Invalid file type';
                continue;
            }
            $files[$key] = $file; // Defer file processing in case of validation errors
        }

        // Don't commit any changes if there were errors
        if (!empty($errors)) {
            return $this->validationErrorResponse($errors);
        }

        // Do file uploads
        foreach ($files as $key => $file) {
            try {
                $path           = $uploader->upload($file, 'settings');
                $settings[$key] = $uploader->pathToRelativeUrl($path);
            } catch (Exception $e) {
                $this->logger->error(sprintf('Failed to move file for key "%s": "%s"', $key, $e->getMessage()));
                return $this->errorResponse('Failed to move file');
            }
        }

        // Try to commit the settings
        try {
            $helper->commitSettings($settings);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

        return $this->handleView($this->view('Settings Updated', Response::HTTP_OK));
    }

    /**
     * @param Settings[] $settings
     *
     * @return Response
     */
    private function settingsResponse (array $settings): Response {
        $json = [];

        foreach ($settings as $setting) {
            if (!$setting instanceof Settings) {
                throw new InvalidArgumentException(sprintf('$settings must be array of "%s" instances', Settings::class));
            }

            $json[] = [
                'key'   => $setting->getKey(),
                'value' => ($setting->getValue() === null) ? '' : $setting->getValue(),
            ];
        }

        return $this->json($json, Response::HTTP_OK);
    }

    /**
     * @param array $errors
     *
     * @return JsonResponse
     */
    private function validationErrorResponse (array $errors): JsonResponse {
        $json = [];
        foreach ($errors as $k => $v) {
            $json[] = ['key' => $k, 'msg' => $v];
        }

        return $this->json($json, Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param string $msg
     *
     * @return JsonResponse
     */
    private function errorResponse (string $msg): JsonResponse {
        return $this->json(['error' => $msg], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
