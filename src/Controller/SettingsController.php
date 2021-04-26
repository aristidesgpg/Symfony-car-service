<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Helper\iServiceLoggerTrait;
use App\Repository\SettingsRepository;
use App\Service\PasswordHelper;
use App\Service\SettingsHelper;
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
 * Class SettingsController.
 *
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
class SettingsController extends AbstractFOSRestController
{
    use iServiceLoggerTrait;
    public const SMS_MAX_LENGTH = 160;
    public const SMS_EXTRA_MAX_LENGTH = 109;
    public const ZIP_LENGTH = 5;
    public const ZIP_P4_LENGTH = 10;
    public const PHONE_LENGTH = 10;
    private const TOO_LONG_MSG = 'Value cannot exceed %d characters';

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
     */
    public function getSettings(SettingsRepository $repo): Response
    {
        return $this->settingsResponse($repo->findAll());
    }

    private function settingsResponse(array $settings): Response
    {
        $json = [];

        foreach ($settings as $setting) {
            if (!$setting instanceof Settings) {
                throw new InvalidArgumentException(sprintf('$settings must be array of "%s" instances', Settings::class));
            }

            // Filter out password hash
            if ('techAppPassword' === $setting->getKey()) {
                $json[] = [
                    'key' => 'techAppPassword',
                    'value' => '',
                ];
                continue;
            }

            $json[] = [
                'key' => $setting->getKey(),
                'value' => (null === $setting->getValue()) ? '' : $setting->getValue(),
            ];
        }

        return $this->json($json, Response::HTTP_OK);
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
     * @SWG\Parameter(name="serviceTwilioFromNumber", type="string", in="formData", maxLength=SettingsController::PHONE_LENGTH)
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
     *
     * Preview Settings
     * @SWG\Parameter(name="previewSalesVideoText", type="string", in="formData", maxLength=SettingsController::SMS_EXTRA_MAX_LENGTH)
     *
     * Upgrade Settings
     * @SWG\Parameter(name="upgradeTradeInTax", type="number", in="formData")
     * @SWG\Parameter(name="upgradeTradeInTaxLimit", type="number", in="formData")
     * @SWG\Parameter(name="upgradeOfferExpiration", type="number", in="formData")
     * @SWG\Parameter(name="upgradeInitialText", type="string", in="formData")
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
     * @SWG\Parameter(name="generalAddress", type="string", in="formData")
     * @SWG\Parameter(name="generalAddress2", type="string", in="formData")
     * @SWG\Parameter(name="generalCity", type="string", in="formData")
     * @SWG\Parameter(name="generalState", type="string", in="formData")
     * @SWG\Parameter(name="generalZip", type="string", in="formData", minLength=SettingsController::ZIP_LENGTH, maxLength=SettingsController::ZIP_P4_LENGTH)
     * @SWG\Parameter(name="generalPhone", type="string", in="formData", maxLength=SettingsController::PHONE_LENGTH)
     * @SWG\Parameter(name="generalLogo", type="file", in="formData")
     *
     * myReview Settings
     * @SWG\Parameter(name="myReviewGoogleUrl", type="string", in="formData")
     * @SWG\Parameter(name="myReviewFacebookUrl", type="string", in="formData")
     * @SWG\Parameter(name="myReviewLogo", type="file", in="formData")
     * @SWG\Parameter(name="myReviewText", type="string", in="formData", maxLength=SettingsController::SMS_MAX_LENGTH)
     * @SWG\Parameter(name="myReviewActivated", type="boolean", in="formData")
     */
    public function setSettings(Request $req, SettingsHelper $helper, UploadHelper $uploader): Response
    {
        $parameterList = $helper->getValidSettings();
        $settings = [];
        $errors = [];
        $files = [];
        // Loop each one to see if it exists and validate it
        foreach ($parameterList as $key) {
            // Doesn't exist, move along
            if (true !== $req->request->has($key) && true !== $req->files->has($key)) {
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
                case 'myReviewText':
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
                case 'upgradeInitialText':
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
                case 'serviceTwilioFromNumber':
                case 'generalPhone':
                    if (self::PHONE_LENGTH !== strlen($val)) {
                        $errors[$key] = sprintf('Phone number must be %d digits', self::PHONE_LENGTH);
                    }
                    break;
                //File Uploads
                case 'custAppPostInspectionVideo':
                case 'generalLogo':
                case 'myReviewLogo':
                    $val = $req->files->get($key);
                    if (!$val instanceof UploadedFile) {
                        $errors[$key] = 'File upload failed';
                        break;
                    } elseif (UPLOAD_ERR_OK !== $val->getError()) {
                        $errors[$key] = $val->getErrorMessage();
                        break;
                    }

                    $isValid = ('custAppPostInspectionVideo' === $key) ? $uploader->isValidVideo(
                        $val
                    ) : $uploader->isValidImage($val);
                    if (true !== $isValid) {
                        $errors[$key] = 'Invalid file type';
                        break;
                    }
                    $files[$key] = $val; // Defer file processing in case of validation errors
                    break;
                default:
            }
            $settings[$key] = $val;
        }

        // Don't commit any changes if there were errors
        if (!empty($errors)) {
            return $this->validationErrorResponse($errors);
        }

        // Do file uploads
        foreach ($files as $key => $file) {
            try {
                if ($uploader->isValidVideo($file)) {
                    $settings[$key] = $uploader->uploadVideo($file, 'settings');
                } else {
                    $settings[$key] = $uploader->upload($file, 'settings');
                }
            } catch (Exception $e) {
                $this->logger->error(sprintf('Failed to upload file for key "%s": "%s"', $key, $e->getMessage()));

                return $this->errorResponse('Failed to upload file');
            }
        }

        // Try to commit the settings
        try {
            $helper->updateMultipleSettings($settings);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

        return $this->handleView($this->view($settings, Response::HTTP_OK));
    }

    private function validationErrorResponse(array $errors): JsonResponse
    {
        $json = [];
        foreach ($errors as $k => $v) {
            $json[] = ['key' => $k, 'msg' => $v];
        }

        return $this->json($json, Response::HTTP_BAD_REQUEST);
    }

    private function errorResponse(string $msg): JsonResponse
    {
        return $this->json(['error' => $msg], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
