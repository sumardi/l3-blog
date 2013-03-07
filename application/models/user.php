<?php

/**
* 	User Model
* 
* 	@package blog
* 	@author Sumardi Shukor <smd@php.net.my>
* 	@license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

class User extends Eloquent
{
	/**
	* 	@access public
	* 	@var string table name
	*/
	public static $table = 'users';

	/**
	* 	One-to-many
	* 
	* 	@access public
	* 	@return Laravel\Database\Eloquent\Relationships
	*/
	public function posts() 
	{
		return $this->has_many('Post');
	}
}