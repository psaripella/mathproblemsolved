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

class Babelu_examsModelNotifications extends Babelu_examsModelBaseList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
					'id','a.id',
					'title','a.title',
					'admin_to_notify','a.admin_to_notify'
					);
		}
		parent::__construct($config);
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		parent::populateState('a.title', 'asc');
	}
	
	protected $searchIn = 'a.title';
	protected function getListQuery()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
	
		$query->select($this->getState('list.select','a.*'));
		$query->from('`#__babelu_exams_notification_profiles` AS a');
	
		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
	
		$query->select('uc2.name AS admin_to_notify_name');
		$query->join('LEFT', '#__users AS uc2 ON uc2.id=a.admin_to_notify');
		
		$query->select('msg.title AS admin_msg_title');
		$query->join('LEFT', '#__babelu_exams_notification_messages AS msg ON msg.id=a.admin_msg_id');

		$query->select('msg2.title AS user_msg_title');
		$query->join('LEFT', '#__babelu_exams_notification_messages AS msg2 ON msg2.id=a.user_msg_id');
			
		if (in_array('a.state', $this->get('filter_fields')))
		{
			$published = $this->getState('filter.state');
	
			if (is_numeric($published))
			{
				$query->where('a.state = '.(int) $published);
			}
			else if ($published === '')
			{
				$query->where('(a.state IN (0, 1))');
			}
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