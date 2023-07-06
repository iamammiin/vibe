<?php

namespace App\Actions\Address;

use App\Actions\Action;
use App\Constant\Address\AddressApiField;
use App\Models\Address;

class StoreAction extends Action
{
    public function __invoke(array $data): array
    {
        $userId = auth()->user()->id;
        $data [AddressApiField::USER_ID] = $userId;

        $address = Address::create($this->toDBUsageField($data));

        return $this->toAPIUsageField($address->toArray());
    }
}
