<?php

namespace App\Models;

use App\Constant\File\FileDatabaseField;
use App\Constant\File\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @OA\Schema(
 *      schema="FileDTO",
 *      title="File Dto",
 *      description="File data",
 *      type="object",
 *      @OA\Property(property="name", title="name", description="name of file", type="string", example="test"),
 *      @OA\Property(property="id", title="id", description="id of file", type="int", example=1),
 *      @OA\Property(property="type", title="type", description="type of file", type="string", example="Video"),
 *      @OA\Property(property="path", title="path", description="path of file", type="string", example="test.jpeg")
 * )
 */
class File extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = FileDatabaseField::AVAILABLE_FOR_CREATE_OR_UPDATE;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, FileDatabaseField::USER_ID, 'id');
    }

    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Type::TITLE[$value],
        );
    }
}
