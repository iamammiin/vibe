<?php

namespace App\Http\Controllers\User;

use App\Actions\User\AssignVibeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AssignVibeRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post (
 *      path="/users/assign-vibe",
 *      tags={"User"},
 *      summary="Assign Vibe to User",
 *      description="Assign Vibe to User",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/AssignVibeRequestBody")
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
class AssignVibeController extends Controller
{
    private AssignVibeAction $action;

    public function __construct(AssignVibeAction $action)
    {
        $this->action = $action;
    }

    public function __invoke(AssignVibeRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = $this->action->__invoke($validated);

        return $this->generateResponse('SUCCESS', $data);
    }
}
