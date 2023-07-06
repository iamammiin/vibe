<?php

namespace App\Http\Controllers\Address;

use App\Actions\Address\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\UpdateRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Patch(
 *      path="/users/addresses",
 *      tags={"UserAddress"},
 *      summary="update Address",
 *      description="update Address",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/AddressUpdateRequestBody")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="object",
 *              @OA\Property(property="message", type="string", example=""),
 *              @OA\Property(property="data", type="object",ref="#/components/schemas/AddressDTO")
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
class UpdateController extends Controller
{
    private UpdateAction $action;

    public function __construct(UpdateAction $action)
    {
        $this->action = $action;
    }

    public function __invoke(UpdateRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = $this->action->__invoke($validated);

        return $this->generateResponse('SUCCESS', $data);
    }
}
