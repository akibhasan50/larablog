<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>rtrim($faker->sentence(rand(5,10)),'.'), 
        'description'=>$faker->paragraph(rand(3,7),true), 
        'image'=>$faker->imageUrl(),
        'user_id'=>rand(1,5),
        'category_id'=>rand(1,5),
        
    ];
});
