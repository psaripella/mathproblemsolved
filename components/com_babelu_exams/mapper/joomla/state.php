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

class Babelu_examsMapperJoomlaState extends Babelu_examsMapperJoomlaBase
{
	/**
	 * Method to get the exam state settings from the db
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @return mixed stdClass or null if query failed
	 */
	public function getState($exam_id, $user_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__babelu_exams_exam_states');
		$query->where('exam_id = '.(int)$exam_id);
		$query->where('user_id = '.(int)$user_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	/**
	 * Method to create an exam state
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @return boolean
	 */
	public function createState($exam_id, $user_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__babelu_exams_exam_states');
		$query->set('exam_id = '.(int)$exam_id)->
		set('user_id = '.(int)$user_id)->
		set('retakable_date = '.$db->quote($db->getNullDate()))->
		set('attempts = '.$db->quote(0));
		$db->setQuery($query);
		
		if ($db->execute())
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Method to update the user exam state
	 * @param int $state_id primary key
	 * @param int $attempts
	 * @param date $retakable_date
	 * @return boolean
	 */
	public function updateState($state_id, $attempts, $retakable_date)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->update('#__babelu_exams_exam_states');
		$query->set('attempts = '.(int)$attempts)->
		set('retakable_date = '.$db->quote($retakable_date));
		$query->where('id = '.(int)$state_id);
		$db->setQuery($query);
		
		if ($db->execute())
		{
			return true;
		}
		return false;
	}
	
}