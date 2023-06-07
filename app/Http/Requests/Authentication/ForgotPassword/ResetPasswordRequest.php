<?php

namespace App\Http\Requests\Authentication\ForgotPassword;

use App\Constant\User\UserApiField;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="ResetPasswordRequestBody",
 *      title="Reset Password Request Body",
 *      description="Reset Password Request Body",
 *      type="object",
 *      @OA\Property(property="password", title="password", description="password of user", type="string", example="12345"),
 *      @OA\Property(property="token", title="token", description="forgot password token", type="string", example="4455"),
 *      @OA\Property(property="email", title="email", description="email og user", type="string", example="user@vibe.com")
 * )
 */
class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            UserApiField::EMAIL => 'required|email|max:195',
            UserApiField::TOKEN => 'required|max:10',
            UserApiField::PASSWORD => 'required|max:30',
        ];
    }
}
