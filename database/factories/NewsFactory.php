<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

//    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->realText(rand(10, 30)),
        'text' => $faker->realText(rand(10, 200)),
        'isPrivate' => (boolean)rand(0, 1),
    ];
});
