<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');

JTable::addIncludePath(JPATH_ROOT . '/administrator/components/com_babelu_exams/tables');

class Babelu_examsModelCategories extends JModelLegacy
{
	public function getDbo()
	{
		return JFactory::getDbo();
	}
	
	public function getCategoryList()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__babelu_exams_categories');
		$query->where('state = '.$db->quote('1'));
		$query->order('ordering');
		$db->setQuery($query);
		return $db->loadObjectList();
	}

	public function getExamCount($cat_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__babelu_exams_exams');
		$query->where('catid = '.(int)$cat_id);
		$query->where('state = '.$db->quote('1'));
		$db->setQuery($query);
		return count($db->loadObjectList());
	}
}