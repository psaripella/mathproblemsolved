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

class Babelu_examsModelGroups extends Babelu_examsModelBaseList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) 
        {
            $config['filter_fields'] = array(
            		'id', 
            		'a.id', 
            		'title', 
            		'a.title', 
            		'created_by', 
            		'a.created_by'
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
		$query->from('`#__babelu_exams_groups` AS a');
		
		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

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
	
	public function getProblemCount($group_id)
	{
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select('id');
		$query->from('#__babelu_exams_problems');
		$query->where('group_id = '.(int)$group_id);
		$db->setQuery($query);
	
		$result = $db->loadColumn();
		return count($result);
	}
}
