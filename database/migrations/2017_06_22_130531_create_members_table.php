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
            $table->increments('member_id')->unsigned();
            $table->string("user_name",20);
            $table->string('password',50);
            $table->string('email',100);
            $table->integer('phone')->unique();
            $table->string("photo",100);
            $table->timestamps();
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
