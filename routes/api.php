<?php

Route::middleware('auth:api')->group(function () {
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Sample API",
     *      description="Sample API",
     *      @OA\Contact(
     *          name="Viacheslav Ostrovskiy",
     *          email="chelout@gmail.com"
     *      ),
     *     @OA\License(
     *         name="MIT",
     *         url="https://opensource.org/licenses/mit-license.php"
     *     )
     * )
     *
     * @OA\Server(
     *      url="api",
     *      description="Sample http Api server",
     * )
     *
     * @OA\SecurityScheme(
     *      type="http",
     *      securityScheme="bearerAuth",
     *      scheme="bearer",
     * )
     *
     * @OA\Get(
     *      path="/me",
     *      tags={"users"},
     *      summary="Get authorized user",
     *      description="Returns authorized user",
     *      operationId="getMe",
     *      @OA\Response(
     *          response=200,
     *          description="Authorized user object",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/User"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error401"
     *              )
     *          ),
     *      ),
     *      security={
     *           {"bearerAuth": {}}
     *      }
     * )
     */
    Route::get('/me', 'MeController')->name('api.me');

    /**
     * @OA\Get(
     *      path="/users",
     *      tags={"users"},
     *      summary="Get users list",
     *      description="Returns users objects list",
     *      operationId="getUsers",
     *      @OA\Parameter(
     *          name="offset",
     *          description="Skip number of records",
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *              default=0,
     *              minimum=0,
     *              example=20
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit number of records",
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *              default=10,
     *              minimum=0,
     *              maximum=100,
     *              example=20
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="q",
     *          description="Search query",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Users objects list",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/UsersList"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error401"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error422"
     *              )
     *          ),
     *      ),
     *      security={
     *           {"bearerAuth": {}}
     *      }
     * )
     */
    Route::get('/users', 'UserController@index')->name('api.users.index');
    /**
     * @OA\Get(
     *      path="/users/{userId}",
     *      tags={"users"},
     *      summary="Get user idenified by id",
     *      description="Returns user idenified by id",
     *      operationId="getUserById",
     *      @OA\Parameter(
     *          name="userId",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="User object",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/User"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error401"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error404"
     *              )
     *          ),
     *      ),
     *      security={
     *           {"bearerAuth": {}}
     *      }
     * )
     */
    Route::get('/users/{user}', 'UserController@show')->name('api.users.show');
});

/**
 * @OA\Get(
 *      path="/posts",
 *      tags={"posts"},
 *      summary="Get posts list",
 *      description="Returns posts objects list",
 *      operationId="getPosts",
 *      @OA\Parameter(
 *          name="offset",
 *          description="Skip number of records",
 *          in="query",
 *          @OA\Schema(
 *              type="integer",
 *              default=0,
 *              minimum=0,
 *              example=20
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="limit",
 *          description="Limit number of records",
 *          in="query",
 *          @OA\Schema(
 *              type="integer",
 *              default=10,
 *              minimum=0,
 *              maximum=100,
 *              example=20
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="q",
 *          description="Search query",
 *          in="query",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Posts objects list",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 ref="#/components/schemas/PostsList"
 *              )
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 ref="#/components/schemas/Error401"
 *              )
 *          ),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 ref="#/components/schemas/Error422"
 *              )
 *          ),
 *      ),
 *      security={
 *           {"bearerAuth": {}}
 *      }
 * )
 */
Route::get('/posts', 'PostController@index')->name('api.posts.index');
/**
 * @OA\Get(
 *      path="/posts/{postId}",
 *      tags={"posts"},
 *      summary="Get post identified by id",
 *      description="Returns post idenified by id",
 *      operationId="getPostById",
 *      @OA\Parameter(
 *          name="postId",
 *          description="Post id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Post object",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  ref="#/components/schemas/Post"
 *              ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 ref="#/components/schemas/Error401"
 *              )
 *          ),
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Not Found",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 ref="#/components/schemas/Error404"
 *              )
 *          ),
 *      ),
 *      security={
 *           {"bearerAuth": {}}
 *      }
 * )
 */
Route::get('/posts/{post}', 'PostController@show')->name('api.posts.show');

Route::middleware('auth:api')->group(function () {
    /**
     * @OA\Post(
     *      path="/posts",
     *      tags={"posts"},
     *      summary="Store user's post",
     *      description="Store user's post and returns created object",
     *      operationId="storePost",
     *      @OA\RequestBody(
     *          ref="#/components/requestBodies/StorePostData"
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Post object",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/Post"
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error401"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error422"
     *              )
     *          ),
     *      ),
     *      security={
     *           {"bearerAuth": {}}
     *      }
     * )
     */
    Route::post('/posts', 'PostController@store')->name('api.posts.store');
    /**
     * @OA\Put(
     *      path="/posts/{postId}",
     *      tags={"posts"},
     *      summary="Update user's post",
     *      description="Update user's post and returns updated object",
     *      operationId="updatePost",
     *      @OA\Parameter(
     *          name="postId",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          ref="#/components/requestBodies/UpdatePostData"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Post object",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/Post"
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error401"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error403"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error404"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error422"
     *              )
     *          ),
     *      ),
     *      security={
     *           {"bearerAuth": {}}
     *      }
     * )
     */
    Route::put('/posts/{post}', 'PostController@update')->name('api.posts.update');
    /**
     * @OA\Delete(
     *      path="/posts/{postId}",
     *      tags={"posts"},
     *      summary="Delete user's post",
     *      description="Delete user's post",
     *      operationId="deletePost",
     *      @OA\Parameter(
     *          name="postId",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="No content"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error401"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error403"
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 ref="#/components/schemas/Error404"
     *              )
     *          ),
     *      ),
     *      security={
     *           {"bearerAuth": {}}
     *      }
     * )
     *
     * @OA\Schema(
     *      schema="Meta",
     *      description="Meta data",
     *      title="Meta data",
     *      type="object",
     *      @OA\Property(
     *          property="overal",
     *          type="integer",
     *          format="int64",
     *          description="Overal records count",
     *          title="Overal records count",
     *          example=10000
     *      ),
     *      @OA\Property(
     *          property="offest",
     *          type="integer",
     *          format="int64",
     *          description="Records offset",
     *          title="Records offset",
     *          default=0,
     *          minimum=0,
     *          example=20
     *      ),
     *      @OA\Property(
     *          property="limit",
     *          type="integer",
     *          format="int64",
     *          description="Records limit",
     *          title="Records limit",
     *          default=10,
     *          minimum=0,
     *          maximum=100,
     *          example=20
     *      ),
     *      @OA\Property(
     *          property="q",
     *          type="string",
     *          format="string",
     *          description="Query string",
     *          title="Query string",
     *          example="Lorem ipsum"
     *      ),
     * ),
     *
     * @OA\Schema(
     *      schema="Error401",
     *      title="Unauthenticated",
     *      description="Unauthenticated",
     *      type="object",
     *      @OA\Property(
     *          property="message",
     *          type="string",
     *          format="string",
     *          description="Error message",
     *          title="Error message",
     *          example="Unauthenticated.",
     *      )
     * ),
     *
     * @OA\Schema(
     *      schema="Error403",
     *      title="Forbidden",
     *      description="Forbidden",
     *      type="object",
     *      @OA\Property(
     *          property="message",
     *          type="string",
     *          format="string",
     *          description="Error message",
     *          title="Error message",
     *          example="This action is unauthorized.",
     *      )
     * ),
     *
     * @OA\Schema(
     *      schema="Error404",
     *      title="Not Found",
     *      description="Not Found",
     *      type="object",
     *      @OA\Property(
     *          property="message",
     *          type="string",
     *          format="string",
     *          description="Error message",
     *          title="Error message",
     *          example="Not Found.",
     *      )
     * ),
     *
     * @OA\Schema(
     *      schema="Error422",
     *      title="Unprocessable Entity",
     *      description="Unprocessable Entity",
     *      type="object",
     *      @OA\Property(
     *          property="message",
     *          type="string",
     *          format="string",
     *          description="Error message",
     *          title="Error message",
     *          example="The given data was invalid.",
     *      ),
     *      @OA\Property(
     *          property="errors",
     *          type="object",
     *          description="Errors",
     *          title="Errors",
     *          example={"limit": {"The limit may not be greater than 100."}},
     *      )
     * )
     */
    Route::delete('/posts/{post}', 'PostController@destroy')->name('api.posts.destroy');
});

/**
 * @OA\Get(
 *      path="/status",
 *      tags={"system"},
 *      summary="Get API status",
 *      description="Get API status",
 *      operationId="getStatus",
 *      @OA\Response(
 *          response=200,
 *          description="Status object",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  ref="#/components/schemas/Status"
 *              ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 ref="#/components/schemas/Error401"
 *              )
 *          ),
 *      ),
 *      security={
 *           {"bearerAuth": {}}
 *      }
 * )
 */
Route::get('/status', 'SystemStatusController')->name('api.status');

Route::fallback('FallbackController')->name('api.fallback');
