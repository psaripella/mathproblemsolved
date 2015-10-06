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

jimport('joomla.application.component.modellist');

abstract class Babelu_examsModelBaseList extends JModelList
{
	protected function getStoreId($id = '')
	{
		$id.= ':' . $this->getState('filter.search');
		$id.= ':' . $this->getState('filter.state');
		return parent::getStoreId($id);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication('administrator');

		$search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_published', '', 'string');
		$this->setState('filter.state', $published);

		$params = JComponentHelper::getParams('com_babelu_exams');
		$this->setState('params', $params);

		parent::populateState($ordering, $direction);
	}

	protected function buildSearch()
	{
		$db		= JFactory::getDbo();
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			if(isset($this->searchIn))
			{
				$where = '';
				$searchInList = explode(',', $this->searchIn);

				$isExact = (JString::strrpos($search, '"'));

				if ($isExact)
				{
					$search = JString::substr($search, 1,-1);
					$where = '( ';
					foreach ((array)$searchInList as $search_field)
					{
						$cleanSearch = $db->Quote($db->escape($search, true));
						$where .=' '.$search_field.' = '.$cleanSearch.' OR';
					}
					$where = substr($where, 0,-3);
					$where.=')';
				}
				else
				{
					$where = '';
					$search = $db->Quote('%'.$db->escape($search, true).'%');

					$where = '( ';
					foreach ((array)$searchInList as $search_field)
					{
						$where .=' '.$search_field.' LIKE '.$search.' OR ';
					}
					$where = substr($where, 0,-3);
					$where.=')';
				}

				return $where;
			}
		}
	}
}