<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioItemContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_item_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
	        $table->integer('item_id', false, true);
	        $table->string('locale', 10);
	        $table->string("title", 150)->nullable();
	        $table->string("short_description", 500)->nullable();
	        $table->string("extended_description", 1200)->nullable();
	        $table->string("key_features", 500)->nullable();
	        $table->string("other_features", 500)->nullable();
	        $table->string("testimonials", 1000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_item_contents');
    }
}
