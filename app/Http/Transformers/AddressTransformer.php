<?php

namespace App\Http\Transformers;

use App\Models\Address;
use League\Fractal\TransformerAbstract;

class AddressTransformer extends TransformerAbstract implements Transformer
{
    public function transform(Address $address): array
    {
        return [
            'id' => $address->id,
            'address' => $address->address,
            'longitude' => $address->longitude,
            'latitude' => $address->latitude,
            'city' => $address->city,
            'state' => $address->state,
            'country' => $address->country,
            'postalCode' => $address->postalCode,
        ];
    }
}
