<?php

namespace App\Http\Transformers\Serializers;

use League\Fractal\Serializer\ArraySerializer;

class CustomSerializer extends ArraySerializer
{
    public function mergeIncludes(array $transformedData, array $includedData): array
    {
        $includedData = array_map(function ($include) {
            if (count($include) == 1 && isset($include['data'])) {
                return $include['data'];
            } else {
                return $include;
            }
        }, $includedData);

        return parent::mergeIncludes($transformedData, $includedData);
    }
}
