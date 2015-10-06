<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */

defined('_JEXEC') or die;

require_once 'problems.php';
class Babelu_examsModelExport extends Babelu_examsModelProblems
{
	public function setModelState()
	{
		$this->context = 'com_babelu_exams.problems';
		parent::populateState();
	}
	
	protected function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select(array('a.group_id AS `group`', 'a.problem_text', 'a.answers AS correct_answers', 'a.options AS incorrect_options', 'a.level', 'a.point_value', 'a.result_text', 'a.state AS status'));
		$query->from('#__babelu_exams_problems AS a');
		
		$published = $this->getState('filter.state');
		if (is_numeric($published)) { $query->where('a.state = '.(int) $published);}
		else if ($published === '') { $query->where('(a.state IN (0, 1))');}
		
		$groupFilter = $this->getState('filter.group', '');
		if ($groupFilter != '')
		{
			$query->where('a.group_id = '.(int)$groupFilter);
		}
		
		$where = $this->buildSearch();
		
		if ($where != '' && JString::strlen($where) != 0)
		{
			$query->where($where);
		}
		
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		if ($orderCol && $orderDirn) { $query->order($db->escape($orderCol.' '.$orderDirn));}
		return $query;
	}
}