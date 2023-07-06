<?php

namespace App\Models;

use App\Constant\User\ExtraData\UserExtraDataDatabaseField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="UserExtraDataDTO",
 *      title="User Extra Data Dto",
 *      description="User Extra Data data",
 *      type="object",
 *      @OA\Property(property="role", title="role", description="role of user", type="int", example=2),
 *      @OA\Property(property="about", title="about", description="about of user", type="string", example="i'm good singer"),
 *      @OA\Property(property="links", title="links", description="links of user", type="array",@OA\Items(type="object",ref="#/components/schemas/LinkEntityRequestBody")),
 *      @OA\Property(property="data", title="links", description="links of user", type="object",ref="#/components/schemas/DataEntityRequestBody")
 * )
 */

class UserExtraData extends Model
{
    use HasFactory;

    protected $table = 'user_extra_data';

    protected $fillable = UserExtraDataDatabaseField::AVAILABLE_FOR_CREATE_OR_UPDATE;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'links' => 'array',
        'data' => 'array'
    ];
}
