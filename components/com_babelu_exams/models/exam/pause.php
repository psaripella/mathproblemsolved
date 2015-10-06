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

class Babelu_examsModelExamPause extends Babelu_examsModelExamSave 
{
	/**
	 * Exam entity
	 * @var Babelu_examsEntityExam
	 */
	protected $exam;
	
	/**
	 * Method to save paused exam data
	 * @return boolean
	 */
	public function pause()
	{
		if (!$this->createSaveRecord())
		{
			return false;
		}

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
	private function createSaveRecord()
	{
		$today = new JDate();
		$user_id = JFactory::getUser()->id;
		$input = JFactory::getApplication()->input;
		
		$exam = $this->getExam();
		
		$exam->setSetting('creation_date', $today->toSql());
		$exam->setSetting('user_id', $user_id);
		$exam->setSetting('time_spent', $this->getTimeSpent());
		
		$saveRepository = new Babelu_examsRepositorySave('joomla');
		return $saveRepository->createSave($exam);
	}
	
	/**
	 * Method to create response records from post input
	 * @return boolean
	 */
	private function saveResponses()
	{
		$input = JFactory::getApplication()->input;
		$inputUtility = new Babelu_examsUtilityUserInput($input);
		$pids = explode('|', $input->get('savecode', null, 'string'));
		
		$responseRepository = new Babelu_examsRepositoryResponse('joomla');
		foreach ($pids AS $pid)
		{
			$response = $inputUtility->getResponse($pid);
			$response->setSetting('parent_id', $this->exam->getSetting('save_id'));
			$responseRepository->savePausedResponse($response);
		}
		
		if ($responseRepository->error == 0)
		{
			return true;
		}
		return false;
	}
	
}