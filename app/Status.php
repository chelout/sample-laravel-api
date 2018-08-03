<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Status",
 *      description="Status",
 *      title="Status",
 *      type="object",
 *      @OA\Property(
 *          property="status",
 *          type="boolean",
 *          description="API Status",
 *          title="API Status",
 *          example=true
 *      ),
 *      @OA\Property(
 *          property="version",
 *          type="string",
 *          description="App version",
 *          title="App version",
 *          example="v1.0.0"
 *      ),
 * )
 */
class Status extends Model
{
    //
}
