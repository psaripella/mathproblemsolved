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

class Babelu_examsRepositoryProblem extends Babelu_examsRepositoryBase
{
	/**
	 * Method to get a filtered list of problem ids by group_id
	 * @param int $group_id foreign key
	 * @param array $filters of sql filter conditions
	 */
	public function getProblemIds($group_id, $filters = array())
	{
		$mapper = $this->getMapper('Problem');
		return $mapper->getProblemIds($group_id, $filters);
	}
	
	/**
	 * Method to get a collection of problem entities
	 * @param array $keys array of primary keys
	 * @param string $context ORM context string
	 * @return array $collection of Babelu_examsEntityProblem
	 */
	public function getProblems($keys)
	{
		$collection = array();
		foreach($keys AS $primaryKey)
		{
			$collection[] = $this->getProblem($primaryKey);
		}
	
		return $collection;
	}
	
	/**
	 * Method to get a problem entity
	 * @param int $problem_id
	 * @return Babelu_examsEntityProblem
	 */
	public function getProblem($problem_id)
	{
		$mapper = $this->getMapper('Problem');
		$problem = new Babelu_examsEntityProblem($mapper->getProblem($problem_id));
		
		return $problem;
	}
	
	/**
	 * Method to get a collection of problem entities with responses
	 * @param string $table_key valid values are 'result' and 'save'
	 * @param int $parent_id foreign key
	 * @param int $section_id foreign key
	 * @return multitype:Babelu_examsEntityProblem
	 */
	public function getProblemsWithResponses($table_key, $parent_id, $section_id)
	{
		$mapper = $this->getMapper('Problem');
		$problems = $mapper->getProblemsWithResponses($table_key, $parent_id, $section_id);
		
		$collection = array();
		foreach ($problems AS $settings)
		{
			$collection[] = new Babelu_examsEntityProblem($settings);
		}
		
		return $collection; 
	}

}