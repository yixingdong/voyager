<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'author_id'=> 1,
        'category_id' => random_int(1,2),
        'seo_title' => $faker->title('mail'),
        'excerpt' => $faker->paragraph,
        'body' => $faker->paragraph,
        'image'=>$faker->imageUrl(),
        'slug' => $faker->slug,
        'meta_description'=>$faker->title,
        'meta_keywords'=>$faker->name
    ];
});

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    $category_ids = \App\Category::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'category_id' => $faker->randomElement($category_ids),
        'body' => $faker->paragraph,
        'image'=>$faker->imageUrl(),
    ];
});

$factory->define(App\Lesson::class, function (Faker\Generator $faker) {
    $course_ids = \App\Course::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'course_id' => $faker->randomElement($course_ids),
        'body' => $faker->paragraph,
        'image'=>$faker->imageUrl(),
    ];
});

$factory->define(\App\Book::class,function(Faker\Generator $faker){
    return [
        'order' => random_int(1,2000),
        'name'  => $faker->title
    ];
});

$factory->define(\App\Comment::class,function (\Faker\Generator $faker){
    $postIds = \App\Post::pluck('id')->toArray();
    $userIds = \App\User::pluck('id')->toArray();
    return [
        'name'     => $faker->name(),
        'body'     => $faker->paragraph,
        'user_id'  => $faker->randomElement($userIds),
        'target_id' => 60,
        'parent_id' => 2002
    ];
});