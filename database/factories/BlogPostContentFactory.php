<?php

use Faker\Generator as Faker;

$factory->define(\Blog\BlogPostContent::class, function (Faker $faker) {

    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');
    $title = $faker->sentence(random_int(3, 8), true);
    $txt = $faker->realText(random_int(1000, 4000));

    $data = [
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
        'post_id' => random_int(1, 100),
        'locale' => 'en',
        'title' => $title,
        'annotation' => $faker->text(random_int(40, 100)),
        'html_content' => $txt,
        'place_name' => 'Таврическое',
        'place_description' => '',
    ];
    return $data;
});
