<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	        $table->integer('post_id', false, true);
	        $table->string('locale', 10);

	        $table->string('title', 150);
	        $table->string('annotation', 500);
	        $table->text('html_content');

	        $table->string('place_name', 100)->nullable();
	        $table->string('place_description', 255)->nullable();


	        $table->index('post_id');
	        $table->index(['post_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_contents');
    }
}
