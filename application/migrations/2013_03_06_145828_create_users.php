<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('username')->unique();
			$table->string('password');
			$table->string('full_name');
			$table->timestamps();
		});

		// Insert default user admin
		$bindings = array('admin', Hash::make('admin'), 'Administrator');
		DB::query('INSERT INTO users(`username`, `password`, `full_name`) values (?, ?, ?)', $bindings);
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}