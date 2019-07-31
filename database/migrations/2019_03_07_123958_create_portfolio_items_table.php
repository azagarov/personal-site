<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

	        $table->integer("parent_id")->nullable();
	        $table->string("url", 255)->nullable();
	        $table->integer("order");
	        $table->string("client_name", 150)->nullable();
	        $table->string("client_logo", 255)->nullable();
	        $table->string("platform", 255)->nullable();
	        $table->string("role", 200)->nullable();
	        $table->string("featured_image", 255)->nullable();
	        $table->string("time_period", 100)->nullable();
	        $table->string("duration", 100)->nullable();
	        $table->string("key_technologies",500)->nullable();
	        $table->string("other_technologies", 500)->nullable();
	        $table->string("third_party", 500)->nullable();
	        $table->string("license", 50)->nullable();
        });

/*
#ID
Parent #ID
Category(es)
Title *
Client Name
Client Logo
URL
Platform(s)
Role(s)
Featured Image
Short description *
Extended description *
Additional images ???
Time period
Duration
Key features *
Other features *
Key technologies
Other technologies
3rd party APIs
Order
Testimonials *
License
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_items');
    }
}
