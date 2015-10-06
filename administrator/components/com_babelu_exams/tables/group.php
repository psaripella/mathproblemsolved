<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsTableGroup extends Babelu_examsTableBase
{

	public function __construct($db)
	{
		parent::__construct('#__babelu_exams_groups', 'id', $db);
	}

	public function check() 
	{
		if (property_exists($this, 'ordering') && $this->id == 0)
		{
			$this->ordering = self::getNextOrder();
		}
		return parent::check();
	}
}