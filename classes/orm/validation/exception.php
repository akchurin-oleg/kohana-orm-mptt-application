<?php defined('SYSPATH') or die('No direct access allowed.');

class ORM_Validation_Exception extends Kohana_ORM_Validation_Exception {

	/**
	 * A small tuning of standard method
	 * to work with this library was more concise
	 *
	 * @param   string  $directory Directory to load error messages from
	 * @param   mixed   $translate Translate the message
	 * @return  array
	 * @see generate_errors()
	 */
	public function errors($directory = NULL, $translate = TRUE)
	{
		$errors = parent::errors($directory, $translate);

		return array_merge($errors, (isset($errors['_external']) ? $errors['_external'] : array()));
	}

}