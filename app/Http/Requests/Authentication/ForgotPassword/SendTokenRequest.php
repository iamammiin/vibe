<?php

namespace App\Http\Requests\Authentication\ForgotPassword;

use App\Constant\User\UserApiField;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="SendTokenRequestBody",
 *      title="Send Token Request Body",
 *      description="Send Token Request Body",
 *      type="object",
 *      @OA\Property(property="email", title="email", description="email of user", type="string", example="user@vibe.com")
 * )
 */
class SendTokenRequest extends FormRequest
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
            UserApiField::EMAIL => 'required|email|exists:users|max:195'
        ];
    }
}
