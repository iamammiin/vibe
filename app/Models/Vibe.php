<?php

namespace App\Models;

use App\Constant\Vibe\Type;
use App\Constant\Vibe\VibeDatabaseField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="VibeDTO",
 *      title="Vibe Dto",
 *      description="Vibe data",
 *      type="object",
 *      @OA\Property(property="name", title="name", description="name of vibe", type="string", example="pop"),
 *      @OA\Property(property="id", title="id", description="id of vibe", type="int", example=1),
 *      @OA\Property(property="description", title="description", description="description of vibe", type="string", example="pop is good"),
 *      @OA\Property(property="image", title="image", description="image of vibe", type="string", example="test.jpeg"),
 *      @OA\Property(property="icon", title="icon", description="icon of vibe", type="string", example="fa-icon")
 * )
 */
class Vibe extends Model
{
    use HasFactory;

    protected $table = 'vibes';

    protected $fillable = VibeDatabaseField::AVAILABLE_FOR_CREATE_OR_UPDATE;

    protected $hidden = [
        VibeDatabaseField::TYPE
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    protected $attributes = [
        VibeDatabaseField::TYPE => Type::VIBE
    ];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where(VibeDatabaseField::TYPE, '=', Type::VIBE);
    }
}
