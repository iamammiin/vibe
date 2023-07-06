<?php

namespace App\Http\Transformers;

use App\Models\File;
use League\Fractal\TransformerAbstract;

class FileTransformer extends TransformerAbstract implements Transformer
{
    public function transform(File $file): array
    {
        return [
            "id" => $file->id,
            "name" => $file->name,
            "type" => $file->type,
            "path" => $file->path
        ];
    }
}
