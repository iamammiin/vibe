<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Http\Transformers\UserTransformer;
use App\Models\Vibe;

class AssignArtistryAction extends Action
{
    public function __invoke(array $artistry): array
    {
        $user = auth()->user();

        $user->artistry()->sync($artistry);

        $response = $this->transform($user, new UserTransformer(), ['artistry']);

        return $this->toAPIUsageField($response);
    }
}
