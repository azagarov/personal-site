<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoryContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category_contents', function (Blueprint $table) {
            $table->increments('id');
	        $table->timestamps();

	        $table->integer('category_id', false, true);
	        $table->string('locale', 10);

	        $table->string('title', 150);
	        $table->string('description', 300);


	        $table->index('category_id');
	        $table->index(['category_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_category_contents');
    }
}
