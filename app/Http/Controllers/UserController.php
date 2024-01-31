<?php

namespace App\Http\Controllers;

use App\Modules\User\Commands\AddUser\AddUserRequest;
use App\Modules\User\Commands\UpdateUser\UpdateUserRequest;
use App\Modules\User\Queries\GetAllUsers\GetAllUsersQuery;
use App\Modules\User\Queries\GetUserById\GetUserByIdRequest;
use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private readonly QueryBus   $queryBus,
        private readonly CommandBus $commandBus
    )
    {
    }

    /**
     * @OA\Get(
     *     tags={"Users"},
     *     path="/api/users",
     *     description="Get all users list",
     *     @OA\Response(
     *         response="200",
     *         description="Success"
     *     )
     * )
     */
    public function getAllUsers(): JsonResponse
    {
        $result = $this->queryBus->send(new GetAllUsersQuery());

        return response()->json($result);
    }

    /**
     * @OA\Get(
     *     tags={"Users"},
     *     path="/api/users/getById",
     *     description="Get user by id",
     *     @OA\Parameter(
     *          in="query",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Response(response="200", description="Success")
     * )
     */
    public function getUserById(GetUserByIdRequest $request): JsonResponse
    {
        $result = $this->queryBus->send($request->toGetUserByIdQuery());

        return response()->json($result);
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     description="Adds a new user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *     )
     * )
     */
    public function addUser(AddUserRequest $request): JsonResponse
    {
        $result = $this->commandBus->send($request->toAddUserCommand());

        return response()->json($result);
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}/update",
     *     description="Update user by id",
     *     tags={"Users"},
     *     @OA\Parameter(
     *           description="User Id to be updated",
     *           in="path",
     *           name="id",
     *           required=true,
     *           @OA\Schema(type="string")
     *       ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *     )
     * )
     */
    public function updateUser(UpdateUserRequest $request, int $id): JsonResponse
    {
        $result = $this->commandBus->send($request->toUpdateUserCommand($id));

        return response()->json($result);
    }

}
