<?php

namespace App\Http\Controllers\User;

use App\Actions\User\GetProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AssignVibeRequest;
use App\Http\Requests\User\GetProfileRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get (
 *      path="/users/get-profile",
 *      tags={"User"},
 *      summary="Get User Profile",
 *      description="Get User Profile",
 *      @OA\Parameter(
 *          name="vibe",
 *          description="if send true get user's vibes",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="address",
 *          description="if send true get user's address",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="artistry",
 *          description="if send true get user's artistry",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="file",
 *          description="if send true get user's files",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="extraData",
 *          description="if send true get user's extra data",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="video",
 *          description="if send true get user's video",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="audio",
 *          description="if send true get user's audio",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="gallery",
 *          description="if send true get user's gallery",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="bool"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="object",
 *              @OA\Property(property="message", type="string", example=""),
 *              @OA\Property(property="data", type="object",ref="#/components/schemas/UserDTO")
 *          )
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *          @OA\JsonContent(type="object",ref="#/components/schemas/Unauthenticated")
 *      ),
 *     security={{"client_bearer_token":{}}}
 * )
 */
class GetProfileController extends Controller
{
    private GetProfileAction $action;

    public function __construct(GetProfileAction $action)
    {
        $this->action = $action;
    }

    public function __invoke(GetProfileRequest $request): JsonResponse
    {
        $validate = $request->validated();

        $data = $this->action->__invoke($validate);

        return $this->generateResponse('SUCCESS', $data);
    }
}
