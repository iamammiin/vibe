<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="AssignVibeRequestBody",
 *      title="Assign Vibe Request Body",
 *      description="Assign Vibe Request Body",
 *      type="array",@OA\Items(type="int",example=2)
 * )
 */
class AssignVibeRequest extends FormRequest
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
            '*' => 'int|exists:vibes,id'
        ];
    }
}
