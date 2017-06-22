<?php

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
            $table->increments('task_id');
            $table->integer('send_user_id');
            $table->integer('receive_id');
            $table->string('content',2000);
            $table->integer('time');
            $table->integer("notify_time1");
            $table->string("notify_content1");
            $table->integer("notify_time2");
            $table->string("notify_content2");
            $table->string('chenphpgfa','100');
            $table->string('jiangli','100');
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
        Schema::drop('tasks');
    }
}
