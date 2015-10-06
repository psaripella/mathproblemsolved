<?php
/**
 * @version     1.7.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsModelProblems extends Babelu_examsModelBaseList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) 
        {
            $config['filter_fields'] = 
            array(
            		'id', 'a.id',
            		'ordering', 'a.ordering',
            		'standard', 'a.standard',
            		'state', 'a.state',
            		'created_by', 'a.created_by',
            		'problem_text', 'a.problem_text',
            		'group_id', 'a.group_id',
            		'answers', 'a.answers',
            		'options', 'a.options',
            		'level', 'a.level',
            		'point_value', 'a.point_value',
            		'result_text', 'a.result_text',
            );
        }
        parent::__construct($config);
    }

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication('administrator');
		$groupFilter = $app->getUserStateFromRequest($this->context.'.filter.group', 'filter_group');
		$this->setState('filter.group', $groupFilter);
		
		$levelFilter = $app->getUserStateFromRequest($this->context.'.filter.level', 'filter_level');
		$this->setState('filter.level', $levelFilter);
		
		parent::populateState('a.problem_text', 'asc');
	}

	protected $searchIn = 'a.problem_text, a.result_text';
	protected function getListQuery()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select','a.*'));
		$query->from('`#__babelu_exams_problems` AS a');
		
		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

		 $query->select('gr.title AS group_title');
		 $query->join('LEFT', '#__babelu_exams_groups AS gr ON gr.id=a.group_id');
		 
		 $query->select('level.title AS level_title, level.ordering AS level_ordering');
		 $query->join('LEFT', '#__babelu_exams_levels AS level ON level.id = a.level');
		 
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
		
		$groupFilter = $this->getState('filter.group', '');
		if ($groupFilter != '')
		{
			$query->where('a.group_id = '.(int)$groupFilter);
		}
		
		$levelFilter = $this->getState('filter.level', '');
		if ($levelFilter != '')
		{
			$query->where('a.level = '.(int)$levelFilter);
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
	
	public function getGroupsList()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title')->select('id');
		$query->from('#__babelu_exams_groups');
		$query->order('id');
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	public function getLevelList()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id, title, ordering');
		$query->from('#__babelu_exams_levels');
		$query->order('ordering');
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}
