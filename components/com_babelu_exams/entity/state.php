<?php
/**
 * @version     1.8.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsEntityState extends Babelu_examsEntityBase
{
	/**
	 * Method to add 1 to attempts
	 */
	public function addAttempt()
	{
		$attempts = $this->getSetting('attempts', 0);
		$this->settings->attempts = ($attempts + 1);
	}

	/**
	 * Method to subtract 1 from attempts
	 */
	public function subtractAttempt()
	{
		$attempts = $this->getSetting('attempts', 0);
		
		if ($attempts != 0)
		{
			$this->settings->attempts = ($attempts - 1);
		}
	}
}