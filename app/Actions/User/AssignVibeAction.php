<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Models\Vibe;

class AssignVibeAction extends Action
{
    public function __invoke(array $vibes): array
    {
        $user = auth()->user();

        $user->vibe()->sync($vibes);

        return $this->toAPIUsageField($user->with(['vibe'])->get()->toArray());
    }
}
