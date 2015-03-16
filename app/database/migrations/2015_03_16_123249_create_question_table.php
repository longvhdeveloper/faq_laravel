<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('title', 255);
            $table->text('content');
            $table->integer('view')->unsigned()->default(0);
            $table->integer('votes')->default(0);
            $table->integer('cate_id');
            $table->integer('user_id');

//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::drop('questions');
	}

}
