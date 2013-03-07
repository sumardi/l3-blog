<?php

/**
* 	Comment Model
* 
* 	@package blog
* 	@author Sumardi Shukor <smd@php.net.my>
* 	@license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

class Comment extends Eloquent
{
	/**
	* 	@access public
	* 	@var string table name
	*/
	public static $table = 'comments';

	/**
	* 	Many-to-many
	* 
	* 	@access public
	* 	@return Laravel\Database\Eloquent\Relationships
	*/
	public function posts() 
	{
		return $this->has_many_and_belongs_to('Post', 'post_comment', 'comment_id', 'post_id');
	}
}