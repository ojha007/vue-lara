<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'question_id' => function () {
            return \App\Models\Question::all()->random();

        },
        'user_id' => function () {
            return \App\User::all()->random();
        }
    ];
});
