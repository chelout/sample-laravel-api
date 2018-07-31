<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $createdAt = $faker->dateTimeBetween('-1 year');
    $updatedAt = $faker->dateTimeBetween('-1 year');
    $deletedAt = $faker->dateTimeBetween('-1 year');
    
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraphs(3, true),
        'created_at' => $createdAt,
        'updated_at' => 0 === $createdAt->diff($updatedAt)->invert ? $updatedAt : $createdAt,
        'deleted_at' => $faker->boolean(10) && 0 === $createdAt->diff($deletedAt)->invert ? $deletedAt : null,
    ];
});
