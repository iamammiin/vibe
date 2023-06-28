<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="UploadFileRequestBody",
 *      title="Upload File Request Body",
 *      description="Upload File Request Body",
 *      type="object",
 *      @OA\Property(property="file", title="file", description="object of file", type="string", format="binary")
 * )
 */
class UploadFileRequest extends FormRequest
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
            'file' => 'required|mimes:jpg,png,jpeg,gif,svg,mp4,mp3|max:10000'
        ];
    }
}
