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

class Babelu_examsModelSections extends Babelu_examsModelBaseList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) 
        {
            $config['filter_fields'] = 
            array(
            		'id', 'a.id',
            		'ordering', 'a.ordering',
            		'title', 'a.title',
            		'description', 'a.description',
            		'exam_id', 'a.exam_id',
            		'group_id', 'a.group_id',
            		'input_type', 'a.input_type',
            		'problem_count', 'a.problem_count',
            		'default_point_value', 'a.default_point_value',
            		'max_options', 'a.max_options',
            		'result_text', 'a.result_text',
            		'randomize', 'a.randomize',
            		'case_sensitivity', 'a.case_sensitivity',
            		'created_by', 'a.created_by',
            		'level', 'a.level',
            		'level_filter_type', 'a.level_filter_type',
            );
        }
        parent::__construct($config);
    }

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication('administrator');
		$filterTitle = $app->getUserStateFromRequest($this->context.'.filter.title', 'filter_title', '', 'string');
		$this->setState('filter.title', $filterTitle);
		
		$examFilter = $app->getUserStateFromRequest($this->context.'.filter.exam', 'filter_exam');
		$this->setState('filter.exam', $examFilter);
		
		$groupFilter = $app->getUserStateFromRequest($this->context.'.filter.group', 'filter_group');
		$this->setState('filter.group', $groupFilter);
		
		$inputFilter = $app->getUserStateFromRequest($this->context.'.filter.input', 'filter_input');
		$this->setState('filter.input', $inputFilter);
		
		$levelFilter = $app->getUserStateFromRequest($this->context.'.filter.level', 'filter_level');
		$this->setState('filter.level', $levelFilter);
		
		parent::populateState('a.title', 'asc');
	}

	protected $searchIn = 'a.title, a.description, a.result_text';
	protected function getListQuery()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select( $this->getState('list.select','a.*'));
		$query->from('`#__babelu_exams_sections` AS a');
		
		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
		
		$query->select('ex.title AS exam_title');
		$query->join('LEFT', '#__babelu_exams_exams AS ex ON ex.id=a.exam_id');
		
		$query->select('gr.title AS group_title');
		$query->join('LEFT', '#__babelu_exams_groups AS gr ON gr.id=a.group_id');
		
		$query->select('level.title AS level_title, level.ordering AS level_ordering');
		$query->join('LEFT', '#__babelu_exams_levels AS level ON level.id = a.level');
		
		$examFilter = $this->getState('filter.exam', '');
		if ($examFilter != '')
		{
			$query->where('a.exam_id = '.(int)$examFilter);
		}
		
		$groupFilter = $this->getState('filter.group', '');
		if ($groupFilter != '')
		{
			$query->where('a.group_id = '.(int)$groupFilter);
		}
		
		$inputFilter = $this->getState('filter.input', '');
		if ($inputFilter != '')
		{
			$query->where('a.input_type = '.(int)$inputFilter);
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
	
	public function getExamList()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		$query->select('id, title');
		$query->from('#__babelu_exams_exams');
				
		$query->order('title');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	public function getGroupList()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		$query->select('id, title');
		$query->from('#__babelu_exams_groups');
		
		$query->order('title');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	public function getLevelList()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);
		
		$query->select('id, title, ordering');
		$query->from('#__babelu_exams_levels');
		
		$query->order('ordering');
		
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}
