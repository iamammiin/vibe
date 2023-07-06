<?php

namespace App\Actions\User\ExtraData;

use App\Actions\Action;
use App\Constant\User\ExtraData\UserExtraDataApiField;
use App\Constant\User\ExtraData\UserExtraDataDatabaseField;
use App\Models\UserExtraData;

class UpdateAction extends Action
{
    public function __invoke(array $data): array
    {
        $userId = auth()->user()->id;
        $userExtraData = UserExtraData::where(UserExtraDataDatabaseField::USER_ID, $userId)->first();

        if (empty($userExtraData)) {
            $data[UserExtraDataApiField::USER_ID] = $userId;
            $userExtraData = UserExtraData::create($this->toDBUsageField($data));
        } else {
            unset($data['userId']);
            if (isset($data['data'])) {
                $oldData = $userExtraData->data ?? [];
                $data['data'] = array_merge($oldData, $data['data']);
            }

            $userExtraData->update($this->toDBUsageField($data));
            $userExtraData = UserExtraData::where(UserExtraDataDatabaseField::USER_ID, $userId)->first();

        }
        return $this->toAPIUsageField($userExtraData->toArray());
    }
}
