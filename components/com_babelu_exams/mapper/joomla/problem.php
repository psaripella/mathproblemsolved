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

class Babelu_examsMapperJoomlaProblem extends Babelu_examsMapperJoomlaBase
{
	/**
	 * Method to get a filtered list of ids
	 * @param int $group_id foreign key
	 * @param string $filters conditional string
	 * @return mixed array of ids or null if query failed
	 */
	public function getProblemIds($group_id, $filters = array())
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('a.id');
		$query->from('#__babelu_exams_problems AS a');
		$query->join('LEFT', '#__babelu_exams_levels AS level ON level.id = a.level');
		$query->where('a.group_id = '.(int)$group_id);
		$query->where('a.state = 1');
	
		foreach ($filters AS $filter)
		{
			if (!empty($filter))
			{
				$query->where($filter);
			}
		}
		$query->order('a.ordering');
		$db->setQuery($query);
		return $db->loadColumn();
	}
	
	/**
	 * Method to get problem setting from database
	 * @param int $problem_id
	 * @return mixed stdClass or null if query failed.
	 */
	public function getProblem($problem_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__babelu_exams_problems');
		$query->where('id = '.(int)$problem_id);
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	public function getProblemsWithResponses($table_key, $parent_id, $section_id)
	{
		// for security purposes we prevent the table and fields from being set directly from param.
		$tables = array('result' =>'#__babelu_exams_r_response', 'save' => '#__babelu_exams_s_response');
		$fields = array('result' => 'a.id AS response_id, a.user_response, a.comment, a.status, a.marked', 'save' => 'a.id AS response_id,a.user_response, a.marked');
		
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select($fields[$table_key]);
		$query->from($tables[$table_key].' AS a');
		$query->select('p.*');
		$query->join('LEFT', '#__babelu_exams_problems AS p ON p.id = a.problem_id');
		$query->where('a.section_id = '.(int)$section_id);
		$query->where('a.parent_id = '.(int)$parent_id);
		$db->setQuery($query);
		
		return $db->loadObjectList();
	}

}