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

class Babelu_examsModelSubmissions extends JModelLegacy
{
	public function getPendingResults()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.*');
		$query->from('#__babelu_exams_results AS a');
		
		$query->select('editor.name AS editor');
		$query->join('LEFT', '#__users AS editor ON editor.id=a.checked_out');
		
		$query->select('uc.name AS user_name, uc.email AS user_email');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.user_id');

		$query->select('buexam.title AS exam_title');
		$query->join('LEFT', '#__babelu_exams_exams AS buexam ON buexam.id=a.exam_id');
		
		$query->select('state.id AS exam_state_id');
		$query->join('LEFT', '#__babelu_exams_exam_states AS state ON state.exam_id = a.exam_id AND state.user_id = a.user_id');
		
		$query->select('bunotify.admin_to_notify');
		$query->join('Left', '#__babelu_exams_notification_profiles AS bunotify ON bunotify.id = buexam.notification_id');
		
		$query->select('admin.name AS notify_name');
		$query->join('LEFT', '#__users AS admin ON admin.id=bunotify.admin_to_notify');
		
		$query->where('(buexam.grading_option = '.$db->quote(1).' OR a.status = '.$db->quote(0).')');
		
		$db->setQuery($query);
		
		return $db->loadObjectList();
	}
}