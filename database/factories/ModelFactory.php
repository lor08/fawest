<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
| $posts = factory(App\Post::class, 3)->make();
*/

$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'note' => $faker->paragraph,
        'slug' => $faker->slug,
        'description' => $faker->paragraphs(3, true),
//        'category_id' => factory(App\Models\NewsCategory::class)->create()->id,
        'category_id' => App\Models\NewsCategory::all()->random()->id,
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\NewsCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'note' => $faker->paragraph,
        'slug' => $faker->slug,
        'desc' => $faker->paragraphs(3, true),
    ];
});