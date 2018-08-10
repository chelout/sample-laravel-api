<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * @OA\Schema(
 *      description="Post model",
 *      title="Post model",
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
 *          description="Post attributes",
 *          title="Post attributes",
 *          ref="#/components/schemas/PostAttributes"
 *      ),
 *      @OA\Property(
 *          property="links",
 *          format="object",
 *          description="Post links",
 *          title="Post links",
 *          ref="#/components/schemas/PostLinks"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="PostAttributes",
 *      description="Post data",
 *      title="Post data",
 *      type="object",
 *      @OA\Property(
 *          property="user_id",
 *          type="integer",
 *          format="int64",
 *          description="User ID",
 *          title="User ID",
 *          example=101
 *      ),
 *      @OA\Property(
 *          property="title",
 *          type="string",
 *          format="string",
 *          description="Title",
 *          title="Title",
 *          example="Laboriosam ullam beatae molestias est nisi ut voluptas."
 *      ),
 *      @OA\Property(
 *          property="body",
 *          type="string",
 *          format="string",
 *          description="Body",
 *          title="Body",
 *          example="Occaecati dolorem dolorum ut repellendus tempora. Impedit consequatur saepe voluptas eum doloribus nulla. Rerum architecto fugiat inventore id adipisci.\n\nUt voluptate enim reiciendis dicta cupiditate sunt. Et ab atque sit eos incidunt. Ducimus eligendi beatae corporis illum dolor eum illo. Id dolor aspernatur et rerum sunt quae.\n\nEa omnis omnis ut ut. Labore illo et suscipit iusto et ullam. Dolorum sunt facilis ea molestiae eum tempora. Explicabo dolorum molestias dolor hic non et."
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
 *      schema="PostLinks",
 *      description="Post links",
 *      title="Post links",
 *      type="object",
 *      @OA\Property(
 *          property="self",
 *          type="object",
 *          description="Self link",
 *          title="Self link",
 *          ref="#/components/schemas/Link"
 *      ),
 *      @OA\Property(
 *          property="update",
 *          type="object",
 *          description="Update link",
 *          title="Update link",
 *          ref="#/components/schemas/Link"
 *      ),
 *      @OA\Property(
 *          property="delete",
 *          type="object",
 *          description="Delete link",
 *          title="Delete link",
 *          ref="#/components/schemas/Link"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="PostsLinks",
 *      description="Posts list links",
 *      title="Posts link links",
 *      type="object",
 *      @OA\Property(
 *          property="self",
 *          type="object",
 *          description="Self link",
 *          title="Self link",
 *          ref="#/components/schemas/Link"
 *      ),
 *      @OA\Property(
 *          property="create",
 *          type="object",
 *          description="Create link",
 *          title="Create link",
 *          ref="#/components/schemas/Link"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="PostsList",
 *      description="Posts list",
 *      title="Posts list",
 *      type="object",
 *      @OA\Property(
 *          property="data",
 *          type="array",
 *          description="Posts array",
 *          title="Posts array",
 *          @OA\Items(
 *              ref="#/components/schemas/Post"
 *          )
 *      ),
 *      @OA\Property(
 *          property="links",
 *          type="object",
 *          description="Posts list links",
 *          title="Posts list links",
 *          ref="#/components/schemas/PostsLinks",
 *      ),
 *      @OA\Property(
 *          property="meta",
 *          type="object",
 *          description="Posts list meta",
 *          title="Posts list meta",
 *          ref="#/components/schemas/Meta",
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="StorePostData",
 *      description="Post data",
 *      title="Post data",
 *      type="object",
 *      required={"title", "body"},
 *      @OA\Property(
 *          property="title",
 *          type="string",
 *          format="string",
 *          description="Title",
 *          title="Title",
 *          example="Post title"
 *      ),
 *      @OA\Property(
 *          property="body",
 *          type="string",
 *          format="string",
 *          description="Body",
 *          title="Body",
 *          example="Post body"
 *      ),
 * )
 *
 * @OA\Schema(
 *      schema="UpdatePostData",
 *      description="Post data",
 *      title="Post data",
 *      type="object",
 *      @OA\Property(
 *          property="title",
 *          type="string",
 *          format="string",
 *          description="Title",
 *          title="Title",
 *          example="Post title",
 *      ),
 *      @OA\Property(
 *          property="body",
 *          type="string",
 *          format="string",
 *          description="Body",
 *          title="Body",
 *          example="Post body",
 *      ),
 * )
 *
 * @OA\RequestBody(
 *      request="StorePostData",
 *      description="Post data",
 *      required=true,
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              ref="#/components/schemas/StorePostData"
 *          ),
 *      )
 * )
 *
 * @OA\RequestBody(
 *      request="UpdatePostData",
 *      description="Post data",
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              ref="#/components/schemas/UpdatePostData"
 *          ),
 *      )
 * )
 */
class Post extends Model
{
    use SearchableTrait;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 1,
            'body' => 1,
        ],
    ];
}
