<?php

/**
* 	Post Controller
* 
* 	@package blog
* 	@author Sumardi Shukor <smd@php.net.my>
* 	@license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

class Post_Controller extends Base_Controller
{
	/**
	* 	@access public
	* 	@var boolean enable restful
	*/
	public $restful = true;

	/**
	* 	Constructor method
	* 
	* 	@access public
	* 	@return void
	*/
	public function __construct()
	{
		$this->filter('before', 'auth')->except(array('view'));
	}

	/**
	* 	Display dashboard
	* 
	* 	@access public
	* 	@return Laravel\View
	*/
	public function get_dashboard()
	{
		$posts = Post::paginate(10);

		return View::make('post.dashboard')->with('posts', $posts);
	}

	/**
	* 	Display single view 
	* 
	* 	@access public
	* 	@param integer 	$id 	Post ID
	* 	@return Laravel\View
	*/
	public function get_view($id)
	{
		$post = Post::find($id);

		return View::make('post.view')->with($post);
	}

	/**
	* 	Display form to update a post
	* 
	* 	@access public
	* 	@param integer 	$id 	Post ID
	* 	@return Laravel\View
	*/
	public function get_update($id)
	{
		$post = Post::find($id);
		$post_id = Crypter::encrypt($post->id);

		return View::make('post.update')
				->with('post', $post)
				->with('post_id', $post_id);
	}

	/**
	* 	Remove a post
	* 
	* 	@access public
	* 	@param integer 	$id 	Post ID
	* 	@return Laravel\View
	*/
	public function get_remove($id)
	{
		$post = Post::find($id);

		if($post->delete()) {
			Session::flash('status', 'The post has been removed!');

			return Redirect::to('post/dashboard');
		}
	}

	/**
	* 	Display HTML form to create new post
	* 
	* 	@access public
	* 	@return Laravel\View
	*/
	public function get_create()
	{
		return View::make('post.create');
	}

	/**
	* 	Create/update post
	* 
	* 	@access public	
	* 	@return Laravel\Redirect
	*/
	public function post_save()
	{
		$rules = array(
					'title' => 'required|max:1000'					
				);

		$validation = Validator::make(Input::all(), $rules);

		$post_id = Input::has('post_id') ? Crypter::decrypt(Input::get('post_id')) : null;

		if ($validation->fails()) {
			if (!is_null($post_id)) {
				return Redirect::to('post/update/' . $post_id)->with_errors($validation)->with_input();	
			} else {
				return Redirect::to('post/create')->with_errors($validation)->with_input();	
			}			
		} else {
			$user = User::find(Auth::user()->id)->first();

			if (!is_null($post_id)) {
				$post = Post::find($post_id);				
			} else {
				$post = new Post();	
			}

			$post->title = Input::get('title');
			$post->body = Input::get('body');			

			if ($user->posts()->save($post)) {
				if(!is_null($post_id)) {
					Session::flash('status', 'The ' . HTML::link('post/view/' . $post->id, 'post') . ' has been updated!');
				} else {
					Session::flash('status', 'New ' . HTML::link('post/view/' . $post->id, 'post') . ' successfully created!');
				}
				

				return Redirect::to('post/dashboard');
			}
		}
	}
}