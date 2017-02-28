<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Todoapp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table){
			$table->increments('id');
			$table->string('taskText');
			$table->boolean('is_checked');
			$table->timestamps();
			$table->integer('tab_id')->unsigned();
            $table->foreign('tab_id')->references('id')->on('tabs')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
Schema::drop('tasks');}}
