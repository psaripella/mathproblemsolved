<?php
/**
 * @version     1.2.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');

class Babelu_examsModelUser extends JModelLegacy
{
	public function __construct($config)
	{
		parent::__construct($config);
	}
	
	public function getResultsList()
	{
		$user_id = JFactory::getUser()->id;
		$db =  JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('r.exam_id AS id, r.creation_date');
		$query->from('#__babelu_exams_results AS r');
		$query->select('e.title');
		$query->join('LEFT', '#__babelu_exams_exams AS e ON e.id = r.exam_id');
		$query->where('r.user_id = '.(int)$user_id);
		$db->setQuery($query);
		return $db->loadObjectList('id');
	}
	
	public function getSavesList()
	{
		$user_id = JFactory::getUser()->id;
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('s.exam_id AS id, s.creation_date, s.time_spent');
		$query->from('#__babelu_exams_saves AS s');
		$query->select('e.title,e.time_limit');
		$query->join('LEFT', '#__babelu_exams_exams AS e ON e.id = s.exam_id');
		$query->where('s.user_id = '.(int)$user_id);
		$db->setQuery($query);
		return $db->loadObjectList('id');
	}
}