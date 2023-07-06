<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Http\Transformers\UserTransformer;

class GetProfileAction extends Action
{
    public function __invoke(array $relation): array
    {
        $user = (auth()->user())->with(array_keys($relation))->first();

        $response = $this->transform($user, new UserTransformer(), array_keys($relation));

        return $this->toAPIUsageField($response);
    }
}
