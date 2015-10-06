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

class Babelu_examsMapperJoomlaSave extends Babelu_examsMapperJoomlaBase
{
	/**
	 * Method to delete a save record and dependant s_responses
	 * @param int $save_id primary key
	 * @return boolean
	 * @throws ErrorException
	 */
	public function deleteSavedExam($save_id)
	{
		// delete dependends first then parent
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->delete('#__babelu_exams_s_response');
		$query->where('parent_id = '.(int)$save_id);
		$db->setQuery($query);
		
		//if the delete failed don't delete the parent
		if ($db->execute())
		{ 
			$query = $db->getQuery(true);
			$query->delete('#__babelu_exams_saves');
			$query->where('id = '.(int)$save_id);
			$db->setQuery($query);
			
			if ($db->execute())
			{
				return true;
			}
			else 
			{
				throw new ErrorException('Error deleting saved record');
			}
		}
		else 
		{
			throw new ErrorException('Error deleting dependents');
		}
		return false;
	}
	
	/**
	 * Method to insert a saved record into the database
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @param int $time_spent time spend in seconds
	 * @param date $creation_date SQL formated data
	 * @return mixed saved record id or false if insert failed
	 */
	public function createSave($exam_id, $user_id, $time_spent, $creation_date)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__babelu_exams_saves');
		$query->set('exam_id = '.(int)$exam_id)->
		set('user_id = '.(int)$user_id)->
		set('time_spent = '.(int)$time_spent)->
		set('creation_date = '.$db->quote($creation_date));
		$db->setQuery($query);
		
		if($db->execute())
		{
			return $db->insertid();
		}
		return false;
	}
}