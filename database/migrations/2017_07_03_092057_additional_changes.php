<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_category', function (Blueprint $table) {
        	$table->integer('post_id');
        	$table->integer('category_id');
        	$table->index('post_id');
        	$table->index('category_id');
        	$table->unique(['post_id', 'category_id']);
        });

        Schema::table('blog_posts', function(Blueprint $table) {
        	$table->string('keywords', 500)->nullable();
        	$table->unique('slug');
        });

        Schema::table('blog_categories', function(Blueprint $table) {
        	$table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_category');
    }
}
