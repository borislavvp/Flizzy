<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' =>$faker->numberBetween(1,3),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(11)), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,6),
        'photo_id' => 1,
        'name' => $faker->sentence(7,11), // secret
        'content' => $faker->paragraphs(rand(10,15),true),
    ];
});

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator','author','subscriber']), // secret
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Tech','Php','Programming','JavaScript','Travel','Nature']), // secret
    ];
});

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'file' => 'placeholder.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => rand(1,10),
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => '',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true),
    ];
});

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => '',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true),
    ];
});