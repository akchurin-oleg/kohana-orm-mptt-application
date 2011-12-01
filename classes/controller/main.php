<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template_Page {

	public function action_index()
	{
		$commentaries = ORM::factory('commentary')
			->new_root(1)
			->children()
			->find_all()
			->as_array();

		$this->template->title = __('MPTT test');

		$this->template->content = View::factory('main/index')
			->bind('commentaries', $commentaries);
	}

	public function action_reply()
	{
		$id = (int) $this->request->param('id');

		$parent = (empty($id)) ? ORM::factory('commentary')->new_root(1) : ORM::factory('commentary', $id);

		if ( ! $parent->loaded())
		{
			throw new HTTP_Exception_404;
		}

		if ($_POST)
		{
			try
			{
				$_POST = Arr::extract($_POST, array('commentary'));

				ORM::factory('commentary')
					->values($_POST)
					->insert_as_last_child($parent);

				$redirect = Route::get('default')->uri();

				if ($this->request->is_ajax())
				{
					return $this->response->body(json_encode(array('redirect' => $redirect)));
				}

				return $this->request->redirect($redirect);
			}
			catch(ORM_Validation_Exception $e)
			{
				$errors = $e->errors('commentary');
			}
		}
		else
		{
			$_POST = Arr::extract($_POST, array('commentary'));
		}

		$this->template->title = __('Post reply');

		$this->template->content = View::factory('main/form/reply')
			->bind('post', $_POST)
			->bind('errors', $errors);
	}

	public function action_verify()
	{
		// Only AJAX requests allowed
		if ( ! $this->request->is_ajax())
		{
			//throw new HTTP_Exception_403(__('Only AJAX requests allowed'));
		}

		// Dont't render the page
		$this->auto_render = FALSE;

		$root = ORM::factory('commentary')
			->new_root(1);

		// Verify current scope
		$verify = $root->verify();

		// Return result
		$this->response
			->headers('content-type', File::mime_by_ext('json'))
			->body(json_encode(array('verify' => (int) $verify, 'error' => $root->verify_error())));
	}

} // End Controller_Main
