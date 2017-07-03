<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

	        $table->integer('author_id', false, true);
	        $table->string('place_coordinates')->nullable();
	        $table->dateTime('date_occurred')->nullable();
	        $table->string('slug');
	        $table->string('status');
	        $table->tinyInteger('main_order');
	        $table->integer('views_total', false, true);
	        $table->integer('views_unique', false, true);
	        $table->integer('shares_count', false, true);

	        $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
