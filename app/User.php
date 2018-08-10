<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * @OA\Schema(
 *      description="User model",
 *      title="User model",
 *      type="object",
 *      required={"title", "body"},
 *      @OA\Property(
 *          property="id",
 *          type="integer",
 *          format="int64",
 *          description="ID",
 *          title="ID",
 *          example=1001
 *      ),
 *      @OA\Property(
 *          property="attributes",
 *          format="object",
 *          description="User attributes",
 *          title="User attributes",
 *          ref="#/components/schemas/UserAttributes"
 *      ),
 *      @OA\Property(
 *          property="links",
 *          format="object",
 *          description="User links",
 *          title="User links",
 *          ref="#/components/schemas/UserLinks"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="UserAttributes",
 *      description="User data",
 *      title="User data",
 *      type="object",
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          format="string",
 *          description="Name",
 *          title="Name",
 *          example="User name"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          format="string",
 *          description="E-mail",
 *          title="E-mail",
 *          example="User email"
 *      ),
 *      @OA\Property(
 *          property="api_token",
 *          type="string",
 *          format="string",
 *          description="Api token",
 *          title="Api token",
 *          example=API_TOKEN
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          type="string",
 *          format="isoDateTime",
 *          description="Created at date/time",
 *          title="Created at date/time",
 *          example="2018-01-01T12:00:00+00:00"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          type="string",
 *          format="isoDateTime",
 *          description="Updated at date/time",
 *          title="Updated at date/time",
 *          example="2018-01-01T12:00:00+00:00"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="UserLinks",
 *      description="User links",
 *      title="User links",
 *      type="object",
 *      @OA\Property(
 *          property="self",
 *          type="object",
 *          description="Self link",
 *          title="Self link",
 *          ref="#/components/schemas/Link"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="UsersLinks",
 *      description="Users list links",
 *      title="Users link links",
 *      type="object",
 *      @OA\Property(
 *          property="self",
 *          type="object",
 *          description="Self link",
 *          title="Self link",
 *          ref="#/components/schemas/Link"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="UsersList",
 *      description="Users list",
 *      title="Users list",
 *      type="object",
 *      @OA\Property(
 *          property="data",
 *          type="array",
 *          description="Users array",
 *          title="Users array",
 *          @OA\Items(
 *              ref="#/components/schemas/User"
 *          )
 *      ),
 *      @OA\Property(
 *          property="links",
 *          type="object",
 *          description="Users list links",
 *          title="Users list links",
 *          ref="#/components/schemas/UsersLinks",
 *      ),
 *      @OA\Property(
 *          property="meta",
 *          type="object",
 *          description="Users list meta",
 *          title="Users list meta",
 *          ref="#/components/schemas/Meta",
 *      ),
 * )
 */
class User extends Authenticatable
{
    use Notifiable;
    use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 1,
            'email' => 1,
        ],
    ];
}
