<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="AddressStoreRequestBody",
 *      title="Address Store Request Body",
 *      description="Address Store Request Body",
 *      type="object",
 *      @OA\Property(property="address", title="address", description="address of user", type="string", example="23 street, florence, italy"),
 *      @OA\Property(property="longitude", title="longitude", description="longitude of user address", type="float", example="43.782387"),
 *      @OA\Property(property="latitude", title="latitude", description="latitude of user address", type="float", example="11.249941"),
 *      @OA\Property(property="city", title="city", description="city of user address", type="string", example="florence"),
 *      @OA\Property(property="state", title="state", description="state of user address", type="string", example="florence"),
 *      @OA\Property(property="country", title="country", description="country of user address", type="string", example="italy"),
 *      @OA\Property(property="postalCode", title="postalCode", description="postalCode of user address", type="string", example="325487923")
 * )
 */
class StoreRequest extends FormRequest
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
            'address' => 'required|min:2|max:500',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'city' => 'required|min:2|max:30',
            'state' => 'nullable|min:2|max:30',
            'country' => 'required|min:2|max:30',
            'postalCode' => 'nullable|min:2'
        ];
    }
}
