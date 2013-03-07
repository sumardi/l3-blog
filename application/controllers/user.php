<?php

/**
* 	Post Controller
* 
* 	@package blog
* 	@author Sumardi Shukor <smd@php.net.my>
* 	@license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

class User_Controller extends Base_Controller
{
	/**
	* 	@access public
	* 	@var boolean enable restful
	*/
	public $restful = true; // default - false

	/**
	* 	Contructor method
	* 
	* 	@access public
	* 	@return void
	*/
	public function __construct()
	{
		$this->filter('before', 'auth')->except(array('login', 'check'));
	}

	/**
	* 	Display login page
	* 
	* 	@access public
	* 	@return Laravel\View
	*/
	public function get_login() 
	{
		return View::make('user.login');
	}

	/**
	* 	Check credential
	* 
	* 	@access public
	* 	@return Laravel\Redirect
	*/
	public function post_check()
	{
		$credential = array(
						'username' => Input::get('username'),
						'password' => Input::get('password'),
					);

		if (Auth::attempt($credential)) {
			return Redirect::to('post/dashboard');
		} else {
			Session::flash('error', 'Wrong username or password. Try again!');
			return Redirect::to('user/login')->with_input();
		}
	}

	/**
	* 	Logout
	* 
	* 	@access public
	* 	@return Laravel\Redirect
	*/
	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('user/login');
	}
}

?>