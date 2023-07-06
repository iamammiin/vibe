<?php

namespace App\Actions;

use App\Http\Transformers\Serializers\CustomSerializer;
use App\Http\Transformers\Transformer;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\DataArraySerializer;

class Action
{
    protected function toDBUsageField(array $fields): array
    {
        $result = [];

        foreach ($fields as $key => $value) {
            $result[$this->toLowerCase($key)] = $value;
        }

        return $result;
    }

    protected function toAPIUsageField(array $fields): array
    {
        $result = [];

        foreach ($fields as $key => $value) {
            if (is_array($value)) {
                $result[$this->toCamelCase($key)] = $this->toAPIUsageField($value);
            } else {
                $result[$this->toCamelCase($key)] = $value;
            }
        }

        return $result;
    }

    private function toLowerCase(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }

    private function toCamelCase(string $string): string
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        $str[0] = strtolower($str[0]);

        return $str;
    }

    protected function transform(Model $model, Transformer $transformer, array $includes = []): array
    {
        $manager = new Manager();
        $manager->setSerializer(new CustomSerializer());
        $manager->parseIncludes($includes);
        $resource = new Item($model, $transformer);


        return $manager->createData($resource)->toArray();
    }
}
