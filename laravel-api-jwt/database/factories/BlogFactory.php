<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\Blog;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'titulo' =>$faker->name,
        'cuerpo'=>$faker->paragraph,
        'url'=>str_slug($faker->company),
        'user_id'=>rand(1,10),
    ];
});
