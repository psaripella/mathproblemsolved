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
class Babelu_examsModelExamSubmit extends Babelu_examsModelExamSave
{
	
	/**
	 * Method to save submitted exam data
	 * @return boolean
	 */
	public function submit()
	{
		if (!$this->createResultRecord())
		{
			return false;
		}
		
		$this->updateState();
		$this->adjustMaxResults();
		
		if (! $this->saveResponses())
		{
			return false;
		}
		
		return true;
	}
	
	/**
	 * Method to create a new save record
	 * @return boolean
	 */
	private function createResultRecord()
	{
		$today = new JDate();
		$user_id = JFactory::getUser()->id;
		$input = JFactory::getApplication()->input;
	
		$exam = $this->getExam();
	
		$exam->setSetting('creation_date', $today->toSql());
		$exam->setSetting('user_id', $user_id);
		$exam->setSetting('time_spent', $this->getTimeSpent());
	
		$saveRepository = new Babelu_examsRepositoryResult('joomla');
		return $saveRepository->createResult($exam);
	}
	
	/**
	 * Method to update the users exam state
	 * @return boolean
	 */
	private function updateState()
	{
		$exam = $this->getExam();
		$exam_id = $exam->getSetting('id');
		$user_id = JFactory::getUser()->id;
	
		$stateRepository = new Babelu_examsRepositoryState('joomla');
		$state = $stateRepository->getState($exam_id, $user_id);
		
		$params = JFactory::getApplication()->getParams();
		$adjustAttempts = $params->get('adjustAttempts', 1);
		
		if ((int)$adjustAttempts == 1)
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
	
		return false;
	}
	
	/**
	 * Method to adjust the total number of result records in the DB
	 */
	private function adjustMaxResults()
	{
		$params = JFactory::getApplication()->getParams();
		$max = $params->get('maxResults', 0);
	
	
		$user_id = JFactory::getUser()->id;
		$exam_id = $this->getExam()->getSetting('id');
	
		$resultRepository = new Babelu_examsRepositoryResult('joomla');
		$resultRepository->adjustMaxResults($exam_id, $user_id, $max);
	}
	
	/**
	 * Method to create response records from post input
	 * @return boolean
	 */
	private function saveResponses()
	{
		$input = JFactory::getApplication()->input;
		$inputUtility = new Babelu_examsUtilityUserInput($input);
		$pids = explode('|', $input->get('savecode', null, 'raw'));
	
		$responseRepository = new Babelu_examsRepositoryResponse('joomla');
		foreach ($pids AS $pid)
		{
			$response = $inputUtility->getResponse($pid);
			$response->setSetting('parent_id', $this->exam->getSetting('result_id'));
			$responseRepository->saveResultResponse($response);
		}
	
		if ($responseRepository->error == 0)
		{
			return true;
		}
		return false;
	}
}
