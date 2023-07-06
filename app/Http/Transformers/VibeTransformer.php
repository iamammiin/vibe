<?php

namespace App\Http\Transformers;

use App\Models\Vibe;
use League\Fractal\TransformerAbstract;

class VibeTransformer extends TransformerAbstract implements Transformer
{
    public function transform(Vibe $vibe): array
    {
        return [
            'id' => $vibe->id,
            "name" => $vibe->name,
            "description" => $vibe->description,
            "image" => $vibe->image,
            "icon" => $vibe->icon
        ];
    }
}
