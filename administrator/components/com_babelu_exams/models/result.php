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

class Babelu_examsModelResult extends Babelu_examsModelGrade
{
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk))
		{
			
		}
		return $item;
	}
}