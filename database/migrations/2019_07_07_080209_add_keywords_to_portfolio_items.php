<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeywordsToPortfolioItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->string('keywords', 500)->nullable();

	        $table->integer('views_total', false, true);
	        $table->integer('views_unique', false, true);
	        $table->integer('shares_count', false, true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            //
        });
    }
}
