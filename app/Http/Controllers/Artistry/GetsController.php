<?php

namespace App\Http\Controllers\Artistry;

use App\Actions\Artistry\GetsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *      path="/artistry",
 *      tags={"Artistry"},
 *      summary="Get Artistry",
 *      description="get artistry",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="object",
 *              @OA\Property(property="message", type="string", example=""),
 *              @OA\Property(property="data", type="array",@OA\Items(type="object",ref="#/components/schemas/ArtistryDTO"))
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
class GetsController extends Controller
{
    private GetsAction $action;

    public function __construct(GetsAction $action)
    {
        $this->action = $action;
    }

    public function __invoke(): JsonResponse
    {
        $data = $this->action->__invoke();

        return $this->generateResponse('SUCCESS', $data);
    }
}
