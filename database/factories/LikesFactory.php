<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Likes;
use Faker\Generator as Faker;

$factory->define(Likes::class, function (Faker $faker) {
    return [

        'question_id' => function () {
            return \App\Models\Question::all()->random();
        },
        'user_id' => function () {
            return \App\User::all()->random();
        },
        'reply_id' => function () {
            return \App\Models\Reply::all()->random();
        }

    ];
});
