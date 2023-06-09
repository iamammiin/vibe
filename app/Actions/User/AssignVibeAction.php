<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Http\Transformers\UserTransformer;
use App\Models\Vibe;

class AssignVibeAction extends Action
{
    public function __invoke(array $vibes): array
    {
        $user = auth()->user();

        $user->vibe()->sync($vibes);

        $response = $this->transform($user, new UserTransformer(), ['vibe']);

        return $this->toAPIUsageField($response);
    }
}
