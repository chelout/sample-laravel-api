<?php

namespace App\Providers;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Faker\Factory as Faker;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        UserResource::withoutWrapping();
        PostResource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function ($app) {
            $faker = Faker::create();
            $faker->seed(1000);

            return $faker;
        });
    }
}
