<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('source', 50)->default('form');
            $table->string('from_name', 150)->default('');
            $table->string('from_email', 150)->default('');
            $table->string('from_phone', 50)->nullable();
            $table->string('subject', 200)->nullable();
            $table->text('message')->nullable();
            $table->string('status', 20)->default('normal');
            $table->tinyInteger('read')->default(0);
            $table->string('tags', 300)->nullable();
            $table->string('keywords', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_messages');
    }
}
