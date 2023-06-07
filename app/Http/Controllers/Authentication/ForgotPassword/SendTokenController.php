<?php

namespace App\Http\Controllers\Authentication\ForgotPassword;

use App\Actions\Authentication\ForgotPassword\SendTokenAction;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\ForgotPassword\SendTokenRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *      path="/auth/forgot-password",
 *      tags={"Authentication"},
 *      summary="forgot password user",
 *      description="forgot password user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/SendTokenRequestBody")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="object",
 *              @OA\Property(property="message", type="string", example="")
 *          )
 *       )
 * )
 */
class SendTokenController extends Controller
{
    private SendTokenAction $sendTokenAction;

    public function __construct(SendTokenAction $sendTokenAction)
    {
        $this->sendTokenAction = $sendTokenAction;
    }

    /**
     * @throws CustomException
     */
    public function __invoke(SendTokenRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $this->sendTokenAction->__invoke($validated);

        return $this->generateResponse('SUCCESS', []);
    }
}
