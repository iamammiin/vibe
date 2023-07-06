<?php

namespace App\Actions\Address;

use App\Actions\Action;
use App\Constant\Address\AddressDatabaseField;
use App\Models\Address;

class UpdateAction extends Action
{
    public function __invoke(array $data): array
    {
        $userId = auth()->user()->id;

        Address::where(AddressDatabaseField::USER_ID, $userId)->update($this->toDBUsageField($data));

        $address = Address::where(AddressDatabaseField::USER_ID, $userId)->first();
        return $this->toAPIUsageField($address->toArray());
    }
}
