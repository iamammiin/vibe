<?php

namespace App\Http\Requests\Authentication;

use App\Constant\User\Type;
use App\Constant\User\UserApiField;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="RegisterUserRequestBody",
 *      title="Register User Request Body",
 *      description="Register User Request Body",
 *      type="object",
 *      @OA\Property(property="type", title="type", description="type of user", type="int", example=2),
 *      @OA\Property(property="email", title="email", description="email of user", type="string", example="user@vibe.com"),
 *      @OA\Property(property="password", title="password", description="password of user", type="string", example="123456"),
 * )
 */
class RegisterUserRequest extends FormRequest
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
            UserApiField::TYPE => 'required|in:'. implode(',',Type::AVAILABLE_TYPE),
            UserApiField::EMAIL => 'required|email|max:195|unique:users',
            UserApiField::PASSWORD => 'required|min:6',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            UserApiField::PASSWORD => bcrypt($this->password),
        ]);
    }
}
