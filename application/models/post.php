<?php

/**
* 	Post Model
* 
* 	@package blog
* 	@author Sumardi Shukor <smd@php.net.my>
* 	@license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

class Post extends Eloquent
{
	/**
	* 	@access public
	* 	@var string table name
	*/
	public static $table = 'posts';

	/**
	* 	One-to-many
	* 
	* 	@access public
	* 	@return Laravel\Database\Eloquent\Relationships
	*/
	public function user() 
	{
		return $this->belongs_to('User');
	}

	/**
	* 	Many-to-many
	* 
	* 	@access public
	* 	@return Laravel\Database\Eloquent\Relationships
	*/
	public function comments()
	{
		return $this->has_many_and_belongs_to('Comment', 'post_comment', 'post_id', 'comment_id');
	}
}