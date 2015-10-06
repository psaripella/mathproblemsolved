<?php
/**
 * @version     1.8.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

class Babelu_examsModelExamNew extends Babelu_examsModelExamBase
{

	/**
	 * Array of problem id arrays.
	 * used to insure uniquness when reusing problem groups in multiple section of the same exam.
	 * @var array
	 */
	private $pidLists = array();
	
	/**
	 * Method to attach problems to each section
	 * @param array $sections array of Babelu_examsEntitySection objects
	 * @param array $filters SQL filter conditions array
	 */
	public function attachProblems()
	{
		$problemRepository = new Babelu_examsRepositoryProblem('joomla');
		
		foreach ($this->exam->getSections() AS $section)
		{
			$level = $section->getLevel($this->exam->getLevel());
			$filter_type = $section->getLevelFilterType($this->exam->getSetting('level_filter_type'));
			$filters = $this->exam->getLevelFilter($level, $filter_type);
			
			if (!$section->hasProblems())
			{
				$group_id = $section->getSetting('group_id', 0);
				$pids = $this->trimDuplicates($problemRepository->getProblemIds($group_id, (array)$filters));
			
				$p_count = $section->getSetting('problem_count', 0);
				$count = $this->adjustCount($pids, $p_count);
			
				if ($section->isRandom())
				{
					$pids = $this->getRandom($pids, $count);
				
					shuffle($pids);
				}
				else
				{
					$pids = array_slice($pids, 0, $count);
				}
			
				$this->pidLists[] = $pids;
				$section->attachProblems($problemRepository->getProblems($pids));
			}
		}
	}

	/**
	 * Returns an array with only unique ids.
	 * @param array $pids array of problem ids
	 * @return array $uniqe
	 */
	private function trimDuplicates($pids)
	{
		$uniqe = array();
	
		foreach ($pids AS $pid)
		{
			if (!$this->inIdList($pid))
			{
				$uniqe[] = $pid;
			}
		}
		return $uniqe;
	}
	
	/**
	 * Checks to see if $id is in the $idLists
	 * @param int $pid problem id to check
	 * @return boolean true if id is in one of the lists
	 */
	private function inIdList($pid)
	{
		foreach ($this->pidLists AS $list)
		{
			if (in_array($pid, $list))
			{
				return true;
			}
		}
		return false;
	}
	
	/**
	 * adjust the count depending on the number of available ids
	 * @param array $pids array of problem ids
	 * @param int $count section count
	 * @return int $adjustedCount
	 */
	private function adjustCount($pids, $count)
	{
		//defaults to all the unique problems
		$default = count($pids);
	
		// get adjusted count
		if ($count <= $default)
		{
			$adjustedCount = $count;
		}
		else
		{
			$adjustedCount = $default;
		}
	
		return $adjustedCount;
	}
	
	/**
	 * Method to get an array of random keys
	 * @param array $pids array of problem ids
	 * @param int $count
	 * @return array of random problem ids
	 */
	private function getRandom($pids, $count)
	{
		$randomKeys = array();
		if ($count != 0)
		{
			$randomKeys = array_rand($pids, $count);
		}
		
		$pidList = array();
		foreach ((array)$randomKeys AS $key)
		{
			$pidList[] = $pids[$key];
		}
	
		return (array)$pidList;
	}
	
	public function updateState()
	{
		$exam = $this->getExam();
		$state = $exam->state;
		$stateRepository = new Babelu_examsRepositoryState('joomla');
		
		$params = JFactory::getApplication()->getParams();
		$adjustAttempts = $params->get('adjustAttempts', 1);
		
		if ((int)$adjustAttempts == 0)
		{
			$retake_delay = ($exam->getSetting('retake_delay', 0) * 60);
			$today = new JDate();
			$retakable_date = new JDate($today->toUnix() + $retake_delay);
			
			$state->setSetting('retakable_date', $retakable_date->toSql());
			$state->addAttempt();
			
			
			if ($stateRepository->updateState($state))
			{
				return true;
			}
		}
	}
}