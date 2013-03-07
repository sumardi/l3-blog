<?php

/**
* 	Comment Controller
* 
* 	@package blog
* 	@author Sumardi Shukor <smd@php.net.my>
* 	@license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

class Comment_Controller extends Base_Controller
{
	/**
	* 	@access public
	* 	@var boolean enable restful
	*/
	public $restful = true;

	/**
	* 	New comment
	* 
	* 	@access public
	* 	@return Laravel\Redirect
	*/
	public function post_new()
	{
		$rules = array(
				'name' => 'required',
				'email' => 'required|email',
				'subject' => 'required|min:5',
				'message' => 'required|min:20',
			);

		$validation = Validator::make(Input::all(), $rules);

		$post_id = Crypter::decrypt(Input::get('post_id'));

		if($validation->fails()) {
			return Redirect::to('post/view/' . $post_id)
					->with_errors($validation)
					->with_input();
		} else {
			$post = Post::find($post_id);

			$comment = new Comment(array(
							'name' => Input::get('name'),
							'email' => Input::get('email'),
							'subject' => Input::get('subject'),
							'message' => Input::get('message')
						));
			$comment = $post->comments()->insert($comment);

			return Redirect::to('post/view/' . $post_id);
		}
	}
}