<?php
/**
 * @version     1.5.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsMapperJoomlaExam extends Babelu_examsMapperJoomlaBase
{
	/**
	 * Method to get an exam setting from database
	 * @param int $exam_id
	 * @return mixed stdClass or null if record doesn't exist
	 */
	public function getExam($exam_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('exam.*');
		$query->from('#__babelu_exams_exams AS exam');
		
		$query->select('level.title AS level_title, level.ordering AS level_order, level.description AS level_desc');
		$query->join('LEFT','#__babelu_exams_levels AS level ON level.id = exam.level');
		
		$query->where('exam.id = '.(int)$exam_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	/**
	 * Method to get exam with result data
	 * @param int $result_id foreign key
	 * @return mixed stdClass or null if query failed
	 */
	public function getExamWithResult($result_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('r.id AS result_id, r.user_id, r.time_spent, r.point_grade, r.percentage_grade, r.status, r.creation_date');
		$query->from('#__babelu_exams_results AS r');
		
		$query->select('exam.*');
		$query->join('LEFT', '#__babelu_exams_exams AS exam ON exam.id = r.exam_id');
		
		$query->select('level.title AS level_title, level.ordering AS level_order, level.description AS level_desc');
		$query->join('LEFT','#__babelu_exams_levels AS level ON level.id = exam.level');
		
		$query->select('np.notify_admin_manual, np.notify_admin_automatic, np.notify_user_automatic');
		$query->join('LEFT','#__babelu_exams_notification_profiles AS np ON np.id = exam.notification_id');
		
		$query->where('r.id = '.(int)$result_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	/**
	 * Method to get exam with saved data
	 * @param int $exam_id primary key
	 * @param int $user_id foreign key
	 * @return mixed stdClass or null if query failed
	 */
	public function getExamWithSave($exam_id, $user_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('exam.*');
		$query->from('#__babelu_exams_exams AS exam');
		
		$query->select('level.title AS level_title, level.ordering AS level_order, level.description AS level_desc');
		$query->join('LEFT','#__babelu_exams_levels AS level ON level.id = exam.level');
		
		$query->select('save.id AS save_id, save.user_id, save.time_spent, save.creation_date');
		$query->join('LEFT', '#__babelu_exams_saves AS save ON save.exam_id = exam.id AND save.user_id = '.(int)$user_id);
		
		$query->where('exam.id = '.(int)$exam_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
}