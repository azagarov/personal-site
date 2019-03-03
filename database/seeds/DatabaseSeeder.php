<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog\BlogPost::class, 100)->create();
        factory(Blog\BlogPostContent::class, 100)->create();
    }
}
