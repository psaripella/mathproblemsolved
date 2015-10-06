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

class Babelu_examsModelCategories extends Babelu_examsModelBaseList
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
            		'created_by', 'a.created_by',
            		'title', 'a.title',
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
		
		parent::populateState('a.title', 'asc');
	}
	
	protected $searchIn = 'a.title, a.description';
	
	protected function getListQuery()
	{
		$db	= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select', 'a.*'));
		$query->from('#__babelu_exams_categories AS a');

		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

		$query->select('acl.title AS access');
		$query->join('LEFT', '#__viewlevels AS acl ON acl.id=a.access');
		
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
		
		$where = $this->buildSearch();

		if ($where != '' && JString::strlen($where) != 0)
		{
			$query->where($where);
		}

		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		if ($orderCol && $orderDirn) {
			$query->order($db->escape($orderCol.' '.$orderDirn));
		}

		return $query;
	}
}