<?php

use Faker\Generator as Faker;

$factory->define(\Blog\BlogPost::class, function (Faker $faker) {

    $title = $faker->sentence(random_int(3, 8), true);
    $arr = array("public", "private", "deleted");
    $rand_keys = array_rand($arr, 1);
    $status = $arr[$rand_keys];
    echo $status;
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

    $data = [
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
        'author_id' => (random_int(1, 5) == 5) ? 1 : 2,
        'place_coordinates' => '',
        'date_occurred' => '2019-03-03',
        'slug' => str_slug($title),
        'status' => $status,
        'main_order' => '0',
        'views_total' => '0',
        'views_unique' => '0',
        'shares_count' => '0',
        'keywords' => 'NULL',
    ];
    return $data;
});
