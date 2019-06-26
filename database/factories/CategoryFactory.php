<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $title=$faker->title;
    return [
        'title'=>$title,
        'slug'=>str_slug($title),
    ];
});
