<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,5),   // rand(1, $maxCategoryId)
        'image' => '',
        'is_private' => 1,
        'title' => $faker->sentence(rand(3,5)),
        'spoiler' => $faker->text(rand(200,220)),
        'description' => $faker->text(rand(1000,2000))
    ];
});
