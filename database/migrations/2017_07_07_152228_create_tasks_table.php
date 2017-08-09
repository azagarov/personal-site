<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('category', 30)->default('');
            $table->string('title', 200);
            $table->string('description', 600)->nullable();
            $table->date('due_date')->nullable();
            $table->tinyInteger('priority')->default(0);
            $table->string('status', 50)->default('open');
            $table->integer('percentage')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
