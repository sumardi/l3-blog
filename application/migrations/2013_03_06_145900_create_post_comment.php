<?php

class Create_Post_Comment {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_comment', function($table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->integer('comment_id')->unsigned();
			$table->timestamps();
			$table->foreign('post_id')->references('id')->on('posts')->on_delete('restrict');
			$table->foreign('comment_id')->references('id')->on('comments')->on_delete('restrict');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_comment');
	}

}