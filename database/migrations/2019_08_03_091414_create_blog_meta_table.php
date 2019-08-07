<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('parent_type', 50)->default('post');
            $table->integer('parent_id', false, true);

            $table->string('type', 50)->default('note');
            $table->string('status', 20)->default('private');

            $table->string('key', 100)->default('');

            $table->string('content', 2000)->nullable();

            $table->string('option_1', 100)->nullable();
            $table->string('option_2', 100)->nullable();
            $table->string('option_3', 100)->nullable();
            $table->string('option_4', 100)->nullable();
            $table->string('option_5', 100)->nullable();

            $table->integer('ord')->default(0);

	        $table->string('locale', 3)->default('all');


	        $table->index(['parent_type', 'parent_id', ]);
	        $table->index(['parent_type', 'parent_id', 'key', ]);
	        $table->index(['parent_type', 'parent_id', 'key', 'locale', ]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_meta');
    }
}
