<?php

namespace App\Models;

use App\Constant\Address\AddressDatabaseField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="AddressDTO",
 *      title="Address Dto",
 *      description="Address data",
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
class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = AddressDatabaseField::AVAILABLE_FOR_CREATE_OR_UPDATE;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];
}
