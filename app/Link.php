<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Link",
 *      description="Link",
 *      title="Link",
 *      type="object",
 *      @OA\Property(
 *          property="method",
 *          type="string",
 *          description="HTTP method",
 *          title="HTTP method",
 *          example="get"
 *      ),
 *      @OA\Property(
 *          property="action",
 *          type="string",
 *          description="Action URL",
 *          title="Action URL",
 *          example="https://sample-api.test/api/posts/1001"
 *      ),
 * )
 */
class Link extends Model
{
    //
}
