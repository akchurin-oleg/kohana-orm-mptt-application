<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Template_Page extends Controller {

	/**
	 * Filename of the template file
	 *
	 * @var string
	 */
	public $template = 'layouts/page';

	/**
	 * Filename of ajax requested template file
	 *
	 * @var string
	 */
	public $ajax_template = 'layouts/ajax';

	/**
	 * Whether the template file should be rendered automatically
	 *
	 * If set, then the template view set above will be created before the controller action begins.
	 * You then need to just set $this->template->content to your content, without needing to worry about the containing template.
	 *
	 * @var boolean
	 */
	public $auto_render = TRUE;

	/**
	 * The before() method is called before your controller action.
	 * In our template controller we override this method so that we can
	 * set up default values. These variables are then available to our
	 * controllers if they need to be modified.
	 *
	 * @return  void
	 */
	public function before()
	{
		// Execute parent::before first
		parent::before();

		if ($this->request->is_ajax())
		{
			$this->template = $this->ajax_template;
		}

		$this->template = View::factory($this->template, array(
			'title'   => NULL,
			'content' => NULL
			));
	}

	/**
	 * The after() method is called after your controller action.
	 * In our template controller we override this method so that we can
	 * make any last minute modifications to the template before anything
	 * is rendered.
	 */
	public function after()
	{
		if ($this->auto_render)
		{
			$this->response->body($this->template);
		}

		parent::after();
	}

} // End Controller_Template_Page