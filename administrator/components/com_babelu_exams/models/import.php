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

class Babelu_examsModelImport extends Babelu_examsModelBaseAdmin
{
	protected $text_prefix = 'COM_BABELU_EXAMS';

	public function getTable($type = 'Problem', $prefix = 'Babelu_examsTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	protected function loadFormData()
	{
		
	}

	public function getItem($pk = null)
	{
		
	}
}
