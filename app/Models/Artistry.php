<?php

namespace App\Models;

use App\Constant\Vibe\Type;
use App\Constant\Vibe\VibeDatabaseField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="ArtistryDTO",
 *      title="Artistry Dto",
 *      description="Artistry data",
 *      type="object",
 *      @OA\Property(property="name", title="name", description="name of artistry", type="string", example="High Energy"),
 *      @OA\Property(property="id", title="id", description="id of artistry", type="int", example=1),
 *      @OA\Property(property="description", title="description", description="description of artistry", type="string", example="is good"),
 *      @OA\Property(property="image", title="image", description="image of artistry", type="string", example="test.jpeg"),
 *      @OA\Property(property="icon", title="icon", description="icon of artistry", type="string", example="fa-icon")
 * )
 */
class Artistry extends Model
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
        VibeDatabaseField::TYPE => Type::ARTISTRY
    ];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where(VibeDatabaseField::TYPE, '=', Type::ARTISTRY);
    }
}
