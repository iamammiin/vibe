<?php

namespace App\Http\Controllers\Address;

use App\Actions\Address\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *      path="/users/addresses",
 *      tags={"UserAddress"},
 *      summary="Store Address",
 *      description="Store Address",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/AddressStoreRequestBody")
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
class StoreController extends Controller
{
    private StoreAction $action;

    public function __construct(StoreAction $action)
    {
        $this->action = $action;
    }

    public function __invoke(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = $this->action->__invoke($validated);

        return $this->generateResponse('SUCCESS', $data);
    }
}
