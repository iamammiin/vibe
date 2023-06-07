<?php

namespace App\Models;

use App\Constant\User\Type;
use App\Constant\User\UserDatabaseField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;


/**
 * @OA\Schema(
 *      schema="UserDTO",
 *      title="User Dto",
 *      description="User data",
 *      type="object",
 *      @OA\Property(property="firstName", title="firstName", description="first name of user", type="string", example="User"),
 *      @OA\Property(property="lastName", title="lastName", description="last name of user", type="string", example="User last Name"),
 *      @OA\Property(property="phone", title="phone", description="phone of user", type="string", example="09211111111"),
 *      @OA\Property(property="type", title="type", description="type of user", type="string", example="Fan or Venue"),
 *      @OA\Property(property="email", title="email", description="email of user", type="string", example="user@vibe.com"),
 *      @OA\Property(property="id", title="id", description="id of user", type="int", example=1),
 *      @OA\Property(property="avatar", title="avatar", description="avatar of user", type="string", example="test.png"),
 *      @OA\Property(property="token", title="token", description="token of user", type="string", example="jwt token")
 * )
 */
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = UserDatabaseField::AVAILABLE_FOR_CREATE_OR_UPDATE;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Type::TITLE[$value],
        );
    }
}
