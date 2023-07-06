<?php

namespace App\Actions\Vibe;

use App\Actions\Action;
use App\Models\Vibe;

class GetsAction extends Action
{
    public function __invoke(): array
    {
        $vibes = Vibe::get();

        return $this->toAPIUsageField($vibes->toArray());
    }
}
