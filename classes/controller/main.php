<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template_Page {

	public function action_index()
	{
		$commentaries = array();

		$this->template->title = __('MPTT test');

		$this->template->content = View::factory('main/index')
			->bind('commentaries', $commentaries);
	}

	public function action_reply()
	{
		$_POST = Arr::extract($_POST, array('comment'));

		$this->template->title = __('Post reply');

		$this->template->content = View::factory('main/form/reply')
			->bind('post', $_POST);
	}

} // End Controller_Main
