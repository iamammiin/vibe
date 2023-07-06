<?php

namespace App\Actions\Artistry;

use App\Actions\Action;
use App\Models\Artistry;

class GetsAction extends Action
{
    public function __invoke(): array
    {
        $artistry = Artistry::get();

        return $this->toAPIUsageField($artistry->toArray());
    }
}
