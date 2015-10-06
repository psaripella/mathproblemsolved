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

class Babelu_examsModelReport extends Babelu_examsModelResults
{
	public function setModelState()
	{
		$this->context = 'com_babelu_exams.results';
		parent::populateState();
	}
	
	protected function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.creation_date AS submitted_date, a.time_spent, a.point_grade, a.percentage_grade, a.status');
		$query->from('`#__babelu_exams_results` AS a');
		
		$query->select('uc.name AS examinee, uc.email AS examinee_email');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.user_id');
		
		$query->select('buexam.title AS exam');
		$query->join('LEFT', '#__babelu_exams_exams AS buexam ON buexam.id=a.exam_id');
		
		$query->select('bunotify.admin_to_notify AS administrator');
		$query->join('Left', '#__babelu_exams_notification_profiles AS bunotify ON bunotify.id = buexam.notification_id');
		
		$query->select('admin.name AS notify_name');
		$query->join('LEFT', '#__users AS admin ON admin.id=bunotify.admin_to_notify');
		
		$query->where('(a.status = 1 OR a.status = 2 OR a.status = 3)');
		
		$adminFilter = $this->getState('filter.admin', '');
		
		if ($adminFilter != '')
		{
			$query->where('bunotify.admin_to_notify = '.(int)$adminFilter);
		}
		
		$examineeFilter = $this->getState('filter.examinee', '');
		if ($examineeFilter != '')
		{
			$query->where('a.user_id = '.(int)$examineeFilter);
		}
		
		$examFilter = $this->getState('filter.exam', '');
		if ($examFilter != '')
		{
			$query->where('a.exam_id = '.(int)$examFilter);
		}
		
		$where = $this->buildSearch();
		
		if ($where != '' && JString::strlen($where) != 0)
		{
			$query->where($where);
		}
		
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		if ($orderCol && $orderDirn)
		{
			$query->order($db->escape($orderCol.' '.$orderDirn));
		}
		
		return $query;
	}
}