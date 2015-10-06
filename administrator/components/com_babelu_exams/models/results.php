<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsModelResults extends Babelu_examsModelBaseList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) 
        {
            $config['filter_fields'] = 
            array(
            		'id', 'a.id',
            		'exam_title', 'buexam.title',
            		'exam_id', 'a.exam_id',
            		'user_id', 'a.user_id',
            		'user_name','uc.name',
            		'notify_name', 'admin.name',
            		'creation_date', 'a.creation_date',
            		'time_spent', 'a.time_spent',
            		'point_grade', 'a.point_grade',
            		'percentage_grade', 'a.percentage_grade',
            		'status', 'a.status'
            );
        }
        parent::__construct($config);
    }

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication('administrator');
		$adminFilter = $app->getUserStateFromRequest($this->context.'.filter.admin', 'filter_admin');
		$this->setState('filter.admin', $adminFilter);
		
		$examineeFilter = $app->getUserStateFromRequest($this->context.'.filter.examinee', 'filter_examinee');
		$this->setState('filter.examinee', $examineeFilter);
		
		$examFilter = $app->getUserStateFromRequest($this->context.'.filter.exam', 'filter_exam');
		$this->setState('filter.exam', $examFilter);
		
		$statusFilter = $app->getUserStateFromRequest($this->context.'.filter.status', 'filter_status');
		$this->setState('filter.status', $statusFilter);
		
		$gradingFilter = $app->getUserStateFromRequest($this->context.'.filter.grading', 'filter_grading');
		$this->setState('filter.grading', $gradingFilter);
		
		parent::populateState('buexam.title', 'asc');
	}

	protected $searchIn = 'buexam.title, uc.name, admin.name';
	
	protected function getListQuery()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select','a.*'));
		$query->from('`#__babelu_exams_results` AS a');
		
		$query->select('uc.name AS user_name, uc.email AS user_email');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.user_id');
		
		$query->select('editor.name AS editor');
		$query->join('LEFT', '#__users AS editor ON editor.id=a.checked_out');
		
		$query->select('buexam.title AS exam_title');
		$query->join('LEFT', '#__babelu_exams_exams AS buexam ON buexam.id=a.exam_id');
       
		$query->select('state.id AS exam_state_id');
		$query->join('LEFT', '#__babelu_exams_exam_states AS state ON state.exam_id = a.exam_id AND state.user_id = a.user_id');
		
        $query->select('bunotify.admin_to_notify');
        $query->join('Left', '#__babelu_exams_notification_profiles AS bunotify ON bunotify.id = buexam.notification_id');
        
        $query->select('admin.name AS notify_name');
        $query->join('LEFT', '#__users AS admin ON admin.id=bunotify.admin_to_notify');
        
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
        
        $gradingFilter = $this->getState('filter.grading', '');
        if ($gradingFilter != '')
        {
        	$query->where('buexam.grading_option = '.(int)$gradingFilter);
        }
        
        $statusFilter = $this->getState('filter.status', '');
        if ($statusFilter != '')
        {
        	$query->where('a.status = '.(int)$statusFilter);
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
	
	public function delete()
	{
		return true;
	}
	
	public function getAdminList()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		$query->select('DISTINCT bunotify.admin_to_notify AS id');
		$query->from('#__babelu_exams_notification_profiles AS bunotify');
		
		$query->select('admin.name');
		$query->join('LEFT', '#__users AS admin ON admin.id = bunotify.admin_to_notify');
		
		$query->order('admin.name');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	public function getExamineesList()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		$query->select('DISTINCT a.user_id AS id');
		$query->from('#__babelu_exams_results AS a');
		
		$query->select('uc.name');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.user_id');
		
		$query->where('a.user_id != 0');
		$query->order('uc.name');
		
		$db->setQuery($query);
		$result = $db->loadObjectList();

		return $result;
	}
	
	public function getExamList()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		$query->select('DISTINCT a.exam_id AS id');
		$query->from('#__babelu_exams_results AS a');
		
		$query->select('buexam.title');
		$query->join('LEFT', '#__babelu_exams_exams AS buexam ON buexam.id=a.exam_id');
		
		$query->order('buexam.title');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}