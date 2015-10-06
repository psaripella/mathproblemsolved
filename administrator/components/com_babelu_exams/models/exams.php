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

class Babelu_examsModelExams extends Babelu_examsModelBaseList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = 
            array(
            		'id', 'a.id',
            		'ordering', 'a.ordering',
            		'state', 'a.state',
            		'title', 'a.title',
            		'pass_per', 'a.pass_per',
            		'time_limit', 'a.time_limit',
            		'retake_limit', 'a.retake_limit',
            		'retake_delay', 'a.retake_delay',
            		'level', 'a.level',
            		'level_filter_type', 'a.level_filter_type',
            		'grading_option', 'a.grading_option',
            		'catid', 'a.catid',
            		'savable', 'a.savable',
            		'show_chart', 'a.show_chart',
            		'access', 'a.access',
            		'description', 'a.description',
            );
        }
        parent::__construct($config);
    }

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();
		$filterAccess = $app->getUserStateFromRequest($this->context.'.filter.access', 'filter_access');
		$this->setState('filter.access', $filterAccess);
		
		$filterGradingOption = $app->getUserStateFromRequest($this->context.'.filter.grading.option', 'filter_grading_option');
		$this->setState('filter.grading.option', $filterGradingOption);
		
		$filterCategory = $app->getUserStateFromRequest($this->context.'.filter.category', 'filter_category_list');
		$this->setState('filter.category', $filterCategory);
		
		parent::populateState('a.title', 'asc');
	}

	protected $searchIn = 'a.title, a.description';
	protected function getListQuery()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select','a.*'));
		$query->from('`#__babelu_exams_exams` AS a');
		
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
            
        $query->select('co.title as cat_title');
        $query->join('LEFT','#__babelu_exams_categories AS co ON co.id=a.catid');

		$query->select('access.title AS access');
		$query->join('LEFT', '#__viewlevels AS access ON access.id = a.access');
		
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
		
		$filter_access = $this->state->get("filter.access");
		if ($filter_access) 
		{ 
			$query->where("a.access = '".$filter_access."'"); 
		} 
		
		$filter_grading_option = $this->state->get("filter.grading.option");
		if ($filter_grading_option != '')
		{
			$query->where('a.grading_option = '.(int)$filter_grading_option);
		}
		
		$filter_category = $this->state->get('filter.category');
		if ($filter_category != '')
		{
			$query->where('a.catid = '.(int)$filter_category);
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
	
	public function getViewLevels()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('id, title');
		$query->from('#__viewlevels');
		$query->order('ordering');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	public function getCategoryList()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('id, title');
		$query->from('#__babelu_exams_categories');
		$query->order('ordering');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}
