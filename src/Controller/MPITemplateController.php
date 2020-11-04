<?php

namespace App\Controller;

use App\Entity\MPITemplate;
use App\Entity\InspectionGroup;
use App\Entity\MPIItem;
use App\Helper\iServiceLoggerTrait;
use App\Repository\MPITemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class MPITemplateController
 *
 * @package App\Controller
 */
class MPITemplateController extends AbstractFOSRestController {
    use iServiceLoggerTrait;

    /**
     * @Rest\Get("/api/users")
     *
     * @SWG\Tag(name="Users")
     * @SWG\Get(description="Get all users")
     * @SWG\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     type="string",
     *     description="permission role for users you are trying to get",
     *     enum={"ROLE_ADMIN", "ROLE_SERVICE_MANAGER", "ROLE_SERVICE_ADVISOR", "ROLE_TECHNICIAN", "ROLE_PARTS_ADVISOR", "ROLE_SALES_MANAGER", "ROLE_SALES_AGENT"}
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Return users",
     *     @SWG\Items(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=User::class, groups={"user_list"})),
     *         description="first name, last name, email, phone, roles, active, last login"
     *     )
     * )
     *
     * @param Request        $request
     * @param UserRepository $userRepo
     * @param UserHelper     $userHelper
     *
     * @return Response
     */
    public function getUsers (Request $request, UserRepository $userRepo, UserHelper $userHelper) {
        $role = $request->query->get('role');

        // role is invalid
        if (!$role || !$userHelper->isValidRole($role)) {
            return $this->handleView($this->view('Invalid Role Parameter', Response::HTTP_BAD_REQUEST));
        }

        $users = $userRepo->getUserByRole($role);

        return $this->userView($users);
    }
}
