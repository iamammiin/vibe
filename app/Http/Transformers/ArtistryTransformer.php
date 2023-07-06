<?php

namespace App\Http\Transformers;

use App\Models\Artistry;
use League\Fractal\TransformerAbstract;

class ArtistryTransformer extends TransformerAbstract implements Transformer
{
    public function transform(Artistry $artistry): array
    {
        return [
            'id' => $artistry->id,
            "name" => $artistry->name,
            "description" => $artistry->description,
            "image" => $artistry->image,
            "icon" => $artistry->icon
        ];
    }
}
