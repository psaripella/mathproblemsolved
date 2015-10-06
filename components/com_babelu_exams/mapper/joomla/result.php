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

class Babelu_examsMapperJoomlaResult extends Babelu_examsMapperJoomlaBase
{
	/**
	 * Method to get result by id
	 * @param int $result_id primary key
	 * @return Mixed stdClass or null if query failed
	 */
	public function getResult($result_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__babelu_exams_results');
		$query->where('id = '.(int)$result_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	/**
	 * Method to insert a result record into the database
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @param date $creation_date SQL formated data
	 * @param int $time_spent time spend in seconds
	 * @param int $point_grade default is 0
	 * @param int $percentage_grade default is 0
	 * @param int $status default is 0
	 * @return mixed result record id or false if insert failed
	 */
	public function createResult($exam_id, $user_id, $creation_date, $time_spent, $point_grade, $percentage_grade, $status)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__babelu_exams_results');
		$query->set('exam_id = '.(int)$exam_id)->
		set('user_id = '.(int)$user_id)->
		set('creation_date = '.$db->quote($creation_date))->
		set('time_spent = '.(int)$time_spent)->
		set('point_grade = '.(int)$point_grade)->
		set('percentage_grade = '.(int)$percentage_grade)->
		set('status = '.(int)$status);
		$db->setQuery($query);
		
		if($db->execute())
		{
			return $db->insertid();
		}
		return false;
	}
	
	/**
	 * Method to update a result record
	 * @param int $result_id primary key
	 * @param int $point_grade
	 * @param int $percentage_grade
	 * @param int $status
	 */
	public function updateResult($result_id, $point_grade, $percentage_grade, $status)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->update('#__babelu_exams_results');
		$query->set('point_grade = '.(int)$point_grade)->
		set('percentage_grade = '.(int)$percentage_grade)->
		set('status = '.(int)$status);
		$query->where('id = '.(int)$result_id);
		
		$db->setQuery($query);
		$db->execute();
	}
	
	/**
	 * Method to get the most recent result
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @return Mixed stdClass or null if query failed
	 */
	public function getMostRecentResult($exam_id, $user_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__babelu_exams_results');
		$query->where('exam_id = '.(int)$exam_id);
		$query->where('user_id = '.(int)$user_id);
		// order newest to oldest
		$query->order('creation_date DESC');
		$db->setQuery($query, 0, 1);
		return $db->loadObject();
	}
	
	/**
	 * Method to count the number of user results in the DB
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @return number
	 */
	public function getResultCount($exam_id, $user_id)
	{
		$db =  $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__babelu_exams_results');
		$query->where('exam_id = '.(int)$exam_id);
		$query->where('user_id = '.(int)$user_id);
		$db->setQuery($query);
		$result = $db->loadColumn();
		return count($result);
	}
	
	/**
	 * Method to delete x number of results from the database where x = count
	 * deleted oldest to newest
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @param int $count limit
	 * @return boolean
	 */
	public function deleteOldestResult($exam_id, $user_id, $count)
	{
		// get the oldest results
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__babelu_exams_results');
		$query->where('exam_id = '.(int)$exam_id);
		$query->where('user_id = '.(int)$user_id);
		// order newest to oldest
		$query->order('creation_date');
		$db->setQuery($query, 0, (int)$count);
		$recIds = $db->loadColumn();
		
		if (!is_null($recIds))
		{
			$query = $db->getQuery(true);
			$query->delete('#__babelu_exams_results');
			
			foreach ($recIds AS $result_id)
			{
				if ($this->deleteDependents($result_id))
				{
					$query->where('id = '.(int)$result_id, 'OR');
				}
			}
			
			$db->setQuery($query);
			
			if ($db->execute())
			{
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Method to delete depenent r_response records
	 * @param int $result_id foreign key
	 * @return boolean
	 */
	private function deleteDependents($result_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->delete('#__babelu_exams_r_response');
		$query->where('parent_id = '.(int)$result_id);
		$db->setQuery($query);
		
		if ($db->execute()) 
		{
			return true;
		}
		return false;
	}
}