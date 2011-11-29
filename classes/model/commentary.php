<?php defined('SYSPATH') or die('No direct script access.');

class Model_Commentary extends Model_MPTT {

	/**
	 * Table that store commentaries
	 *
	 * @var string
	 */
	protected $_table_name = 'commentaries';

	/**
	 * We need no path in commentaries
	 *
	 * @var bool
	 */
	protected $_path_calculation_enabled = FALSE;

	/**
	 * Model rules
	 *
	 * @return array
	 */
	public function rules()
	{
		return array
		(
			'commentary' => array
			(
				//array('not_empty'),
				//array('max_length', array(':value', 1024))
			)
		);
	}

	/**
	 * Model filters
	 *
	 * @return array
	 */
	public function filter()
	{
		return array
		(
			'commentary' => array('strip_tags', 'trim')
		);
	}

	/**
	 * Creates a complaint
	 *
	 * @param   array           $values
	 * @param   Model_Article   $article
	 * @param   Model_User      $user
	 * @return  Model_Complaint
	 */
	public function create_commentary(array $values, Model_Commentary $parent)
	{
		$this->article = $article;
		$this->user    = $user;

		return $this
			->values($values, array(
				'date',
				'message'
			))
			->save();
	}

	/**
	 * New scope
	 * This also double as a new_root method allowing
	 * us to store multiple trees in the same table.
	 *
	 * @param   mixed    New scope to create
	 * @param   array    Additional fields
	 * @return  boolean
	 */
	public function new_scope($scope, array $fields = array())
	{
		return parent::new_scope($scope, $fields);
	}

} // End Model_Commentary
