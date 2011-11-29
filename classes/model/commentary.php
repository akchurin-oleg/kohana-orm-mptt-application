<?php defined('SYSPATH') or die('No direct script access.');

class Model_Commentary extends Model_MPTT {

	/**
	 * Table that store commentaries
	 *
	 * @var  string  Table name
	 */
	protected $_table_name = 'commentaries';

	/**
	 * Model rules
	 *
	 * @return array
	 */
	public function rules()
	{
		return array();
	}

	/**
	 * Model filters
	 *
	 * @return array
	 */
	public function filter()
	{
		return array();
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

} // End Model_Commentary
