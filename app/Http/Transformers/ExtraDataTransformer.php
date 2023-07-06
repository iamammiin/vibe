<?php

namespace App\Http\Transformers;

use App\Models\UserExtraData;
use League\Fractal\TransformerAbstract;

class ExtraDataTransformer extends TransformerAbstract implements Transformer
{
    public function transform(UserExtraData $extraData): array
    {
        return [
            'role' => $extraData->role,
            'links' => $extraData->links,
            'data' => $extraData->data,
            'about' => $extraData->about
        ];
    }
}
