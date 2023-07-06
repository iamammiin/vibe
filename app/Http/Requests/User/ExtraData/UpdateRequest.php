<?php

namespace App\Http\Requests\User\ExtraData;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="UserExtraDataUpdateRequestBody",
 *      title="User Extra Data Update Request Body",
 *      description="User Extra Data Update Request Body",
 *      type="object",
 *      @OA\Property(property="role", title="role", description="role of user", type="int", example=2),
 *      @OA\Property(property="about", title="about", description="about of user", type="string", example="i'm good singer"),
 *      @OA\Property(property="links", title="links", description="links of user", type="array",@OA\Items(type="object",ref="#/components/schemas/LinkEntityRequestBody")),
 *      @OA\Property(property="data", title="links", description="links of user", type="object",ref="#/components/schemas/DataEntityRequestBody")
 * )
 */
class UpdateRequest extends FormRequest
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
            'role' => 'numeric',
            'about' => 'nullable|string',
            'links' => 'array',
            'data' => 'array'
        ];
    }
}
