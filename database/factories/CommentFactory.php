<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id'   => 1,
        'user_id'   => 1,
        'comment'   => $faker->paragraph()
    ];
});
