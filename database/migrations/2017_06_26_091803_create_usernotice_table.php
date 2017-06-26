<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsernoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usernotice', function (Blueprint $table) {
            $table->increments('notice_id');
            $table->integer('user_id');
            $table->string('user_name');
            $table->integer("noticetype");
            $table->integer("typeid");
            $table->integer("count");
            $table->string("remark");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usernotice');
    }
}
