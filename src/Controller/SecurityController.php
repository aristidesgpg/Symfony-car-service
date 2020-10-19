<?php

namespace App\Controller;

use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;

use App\Service\UserHelper;
use App\Service\SecurityHelper;

/**
 * Class SecurityController
 *
 * @package App\Controller
 */
class SecurityController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Post("/api/security/{id}/set")
     * 
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Set Security question and answer for a User")
     * 
     * @SWG\Parameter(
     *     name="question",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Question of a User",
     * )
     * @SWG\Parameter(
     *     name="answer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Answer of a User",
     * )
     * 
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Security Question Has Been Updated" }),
     *         )
     * )
     * 
     * @param User                   $user
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param UserHelper             $userHelper
     *
     * @return JsonResponse
     */
    public function security (User $user, Request $request, EntityManagerInterface $em, UserHelper $userHelper) {

        $question = $request->get('question');
        $answer   = $request->get('answer');

        //check if parameters are valid
        if(!$question || !$answer){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //id is invalid
        if(!$user){
            return $this->handleView($this->view('Invalid ID Parameter', Response::HTTP_BAD_REQUEST));
        }

        $array = [
            'question' => $question,
            'answer'   => strtolower($answer)
        ];

        if(!$userHelper->massAssign($user, $array)){
            return $this->handleView($this->view('Something Went Wrong Trying to Set Security for the User', Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        return new JsonResponse([
            'message' => 'Security Question Has Been Updated'
        ]);
    }

    /**
     * @Rest\Post("/api/security/{id}/validate")
     * 
     * @SWG\Tag(name="Security")
     * @SWG\Post(description="Check if security answer is correct")
     * 
     * @SWG\Parameter(
     *     name="answer",
     *     in="formData",
     *     required=true,
     *     type="string",
     *     description="The Security Answer of a User",
     * )
     * 
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Return status code",
     *     @SWG\Items(
     *         type="object",
     *             @SWG\Property(property="status", type="string", description="status code", example={"status":
     *                                              "Security Question Has Been Validated" }),
     *         )
     * )
     * 
     * @param User                   $user
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @param SecurityHelper         $securityHelper
     *
     * @return JsonResponse
     */
    public function validate (User $user, Request $request, EntityManagerInterface $em, SecurityHelper $securityHelper) {

        $answer   = $request->get('answer');

        //check if parameter is valid
        if(!$answer){
            return $this->handleView($this->view('Missing Required Parameter', Response::HTTP_BAD_REQUEST));
        }
        //id is invalid
        if(!$user){
            return $this->handleView($this->view('Invalid ID Parameter', Response::HTTP_BAD_REQUEST));
        }

        if(!$securityHelper->validateSecurity($user, $answer)){
            return $this->handleView($this->view('Invalid Security Answer', Response::HTTP_UNAUTHORIZED));
        }

        return new JsonResponse([
            'message' => 'Security Question Has Been Validated'
        ]);
    }
}
