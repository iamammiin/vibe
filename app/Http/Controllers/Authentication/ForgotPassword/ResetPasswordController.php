<?php

namespace App\Http\Controllers\Authentication\ForgotPassword;

use App\Actions\Authentication\ForgotPassword\ResetPasswordAction;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\ForgotPassword\ResetPasswordRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *      path="/auth/reset-password",
 *      tags={"Authentication"},
 *      summary="reset password user",
 *      description="reset password user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/ResetPasswordRequestBody")
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
class ResetPasswordController extends Controller
{
    private ResetPasswordAction $resetPasswordAction;

    public function __construct(ResetPasswordAction $resetPasswordAction)
    {
        $this->resetPasswordAction = $resetPasswordAction;
    }

    /**
     * @throws CustomException
     */
    public function __invoke(ResetPasswordRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $this->resetPasswordAction->__invoke($validated);

        return $this->generateResponse('SUCCESS', []);
    }
}
