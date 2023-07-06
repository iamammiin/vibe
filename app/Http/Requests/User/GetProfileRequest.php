<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class GetProfileRequest extends FormRequest
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
            'vibe' => 'bool',
            'address' => 'bool',
            'file' => 'bool',
            'artistry' => 'bool',
            'extraData' => 'bool',
            'audio' => 'bool',
            'video' => 'bool',
            'gallery' => 'bool',
        ];
    }
}
