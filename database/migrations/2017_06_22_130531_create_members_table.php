<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string("user_name",20);
            $table->string('password',50);
            $table->string('email',100);
            $table->integer('phone');
            $table->string("photo",100);
            $table->timestamps();
        });
         Schema::table('members', function($table)
        {
            $table->string("uuid",50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
