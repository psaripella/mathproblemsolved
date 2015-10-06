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

class Babelu_examsModelCategory extends JModelLegacy
{
	public function getDbo()
	{
		return JFactory::getDbo();
	}
	
	public function getCategory()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('title, description');
		$query->from('#__babelu_exams_categories');
		$cat_id = JFactory::getApplication()->input->get('id', 0, 'int');
		$query->where('id = '.(int)$cat_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	public function getExamList()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('id, title, description');
		$query->from('#__babelu_exams_exams');
		$cat_id = JFactory::getApplication()->input->get('id', 0, 'int');
		$query->where('catid = '.(int)$cat_id);
		$query->where('state = '.$db->quote('1'));
		$query->order('ordering');	
		$db->setQuery($query);
		return $db->loadObjectList();		
	}
}